<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
class Server extends Model
{
    const PERMISSIONS_PRIVATE = 10;
     
    public $text;
 
    public function rules()
    {
        return [
            [['text','permissions'], 'required'],
        ];
    }


    /**
    * Get the actual servers 
    */
    public function getServers(){
        $db = Yii::$app->db;
        $cmd = $db->createCommand('SELECT * FROM servers');
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $servers = $cmd->queryAll();
        //print_r($servers);
        foreach($servers as $server){
            //print_r($server);
            $this->getServerLastMetrics( $server );
            //$this->getServerThresholds( $server ); 
            $this->getServerThresholdConnections($server);
        }
        return $servers;
    }

    /**
    * Get last information reported by  the server 
    */
    public function getServerLastMetrics($server){
        $db = Yii::$app->db;
        $columns = "";
        $sql = "SELECT id, server, cpu, memory, disk , connections , DATE_SUB(date, INTERVAL 4 HOUR) date  
                FROM metrics 
                WHERE server = :server ORDER BY date DESC ";
        $cmd = $db->createCommand( $sql )
                  ->bindValues( [':server' => $server->id ] );
      
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $metrics = $cmd->queryOne();
        
        if( isset($metrics->date)){
            $metrics->date2 = $this->timeAgo($metrics->date);
        }
        $server->metrics = $metrics;
    }

     /**
    * Get server thresholds
    */
    public function getServerThresholds( $server ){
        $db = Yii::$app->db;
        $columns = "";
        $sql = "SELECT id, metric, s.limit , message
                FROM server_thresholds as s
                WHERE server = :server ";
        $cmd = $db->createCommand( $sql )
                  ->bindValues( [':server' => $server->id ] );
      
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $thresholds = $cmd->queryAll();
    
        //Array ( [0] => stdClass Object ( [id] => 1 [metric] => connections [limit] => 150 
        //[message] => SERVER_VALUE has VALUE connections and reached the maximun connections threshold. ) ) 
        $server->thresholds = $thresholds;

        //Check if we need to apply a threshold
        foreach ($server->thresholds as $threshold ) {
            $metric = $threshold->metric;
            if(isset($server->metrics->$metric)){
                $value = $server->metrics->$metric;
                if( $value > $threshold->limit ){
                    $msg = str_replace("SERVER_VALUE", $server->name, $threshold->message);
                    $msg = str_replace("ACTUAL_VALUE", $value, $msg);
                    $server->warnings[] = $msg;
                }    
            }
            
        }
    }


     /**
    * Get server thresholds connections to update the gui
    */
    public function getServerThresholdConnections( $server ){
        $db = Yii::$app->db;
        $columns = "";
        $sql = "SELECT id, metric, s.limit , message
                FROM server_thresholds as s
                WHERE server = :server and metric='connections' ";
        $cmd = $db->createCommand( $sql )
                  ->bindValues( [':server' => $server->id ] );
      
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $threshold = $cmd->queryOne();
    
        $server->connections = "info";
        if( isset($threshold->limit) && isset($server->metrics->connections)){

            if( $server->metrics->connections > $threshold->limit ){
                $server->connections = "danger";
            }   
            else if( $server->metrics->connections + 50 > $threshold->limit ){
                $server->connections = "warning";
            }
        }
    }



    public function find(){
        echo "find...";
        //$db = new Connection();
        $db = Yii::$app->db;

        $cmd = $db->createCommand('SELECT * FROM status');
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $posts = $cmd->queryAll();
        //$query = Status::find();
        //$query = $this->find();
        print_r($posts);
        //exit;
    }
     
    public function getPermissions() {
      return array (self::PERMISSIONS_PRIVATE=>'Private',self::PERMISSIONS_PUBLIC=>'Public');
    }
     
    public function getPermissionsLabel($permissions) {
      if ($permissions==self::PERMISSIONS_PUBLIC) {
        return 'Public';
      } else {
        return 'Private';        
      }
    }

    /**
     * Time Ago
     *
     * @param $datetime mysql datetime format
     * @param $full - return full datetime or not
     *           
     * @return datetime - time ago 
     */
    public static function timeAgo($datetime, $full = false){   
        date_default_timezone_set('Etc/GMT+4');
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
      
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
            'y' => 'Year',
            'm' => 'Month',
            'w' => 'Week',
            'd' => 'Day',
            'h' => 'Hour',
            'i' => 'Minute',
            's' => 'Second',
        ];

        foreach ($string as $k => &$v) 
        {
            if ($diff->$k) 
            {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' ' : '');
            } 
            else 
            {
                unset($string[$k]);
            }
        }

        if ( ! $full)
        {
            $string = array_slice($string, 0, 1);   
        } 

        return $string ? implode(', ', $string) . '' : 'just now';

    }

    /**
    * Execute the server thresholds crons
    */
    public function cron(){
        $db = Yii::$app->db;
        $cmd = $db->createCommand('SELECT * FROM servers');
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $servers = $cmd->queryAll();
      
        foreach($servers as $server){
           
            $this->getServerLastMetrics( $server );
            $this->getServerThresholds( $server ); 
            if( isset($server->warnings) && count($server->warnings) > 0 ){
                //Send email message
                $emails = $this->getThresholdNotificationEmails();
                foreach($emails as $item){
                    $msg = "sample";
                    echo "Sending message {$item->email}";
                    mail( $item->email,"Mkit Server App",$msg); 
                }
                
            }

            //$this->getServerThresholdConnections($server);
        }
        return $servers;
    }


    /**
    * Get all the email notifications for server Thresholds 
    */
    public function getThresholdNotificationEmails(){
        $db = Yii::$app->db;
        $cmd = $db->createCommand('SELECT * FROM server_notifications');
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $notifications = $cmd->queryAll();
        return $notifications;
    }
}
?>