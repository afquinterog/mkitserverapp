<?php

namespace app\models;

use Yii;
use yii\base\Model;

class User extends Model implements \yii\web\IdentityInterface
{

    //private static $user;

    public $id;
    public $username;
    public $password;
    public $status;
    public $type;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $db = Yii::$app->db;
        $cmd = $db->createCommand('SELECT * FROM users WHERE id = :id LIMIT 1 ')
                  ->bindValue(':id', $id );
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $user = $cmd->queryOne();
        if(isset($user->id)){
            $user->authKey = "sample";
            $user->accessToken ="sample";
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    /*public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }*/

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username, $password){
        $db = Yii::$app->db;
        $cmd = $db->createCommand('SELECT * FROM users WHERE username = :username LIMIT 1 ')
                  ->bindValue(':username', $username );
        $cmd->fetchMode = \PDO::FETCH_OBJ ; 
        $user = $cmd->queryOne();
        if( $user->password == md5($password) ){
            //self::$user = $user;
            $user->authKey = "sample";
            $user->accessToken ="sample";
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
