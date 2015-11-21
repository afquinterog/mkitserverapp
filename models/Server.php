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
        $cmd = $db->createCommand('SELECT * FROM metrics WHERE server = :server ORDER BY date DESC ')
                  ->bindValue(':server', $server->id );
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $metrics = $cmd->queryOne();
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
}
?>