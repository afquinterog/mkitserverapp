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
    public static function timeAgo($datetime, $full = false)
    {   
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
}
?>