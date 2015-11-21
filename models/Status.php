<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
class Status extends Model
{
    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;
     
    public $text;
    public $permissions;
 
    public function rules()
    {
        return [
            [['text','permissions'], 'required'],
        ];
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