<?php
namespace app\controllers;
 
use Yii;
use yii\web\Controller;
use app\models\Server;
use yii\helpers\Url;

use app\models\Login;
 
class ServerController extends Controller
{


    /**
    * List actual servers in the monitor app
    */
    public function actionIndex(){

        $user = Yii::$app->user->getIdentity();
        if(isset($user->id) ){
            $model = new Server;
            //print_r( Yii::$app->user->getIdentity() );

            $servers = $model->getServers();
            $this->layout = 'app';
            return $this->render('index', array('servers' => $servers, 'app' => Yii::$app, 'user' => $user ) );    
        }
        else{
             return $this->actionLoginform();
        }

        
    }

     /**
    * List actual servers in the monitor app
    */
    public function actionDetail(){

        $user = Yii::$app->user->getIdentity();
        if(isset($user->id) ){
            $model = new Server;
            //print_r( Yii::$app->user->getIdentity() );

            $servers = $model->getServers();
            $this->layout = 'app';
            return $this->render('detail', array('servers' => $servers, 'app' => Yii::$app, 'user' => $user ) );    
        }
        else{
             return $this->actionLoginform();
        }

        
    }

    public function actionCreate()
    {
        //$model = new Status;

        //print_r( Yii::$app->user->getIdentity() );
        //exit;

        //$postUrl = Yii::$app->createUrl( array('/status/create') ); 
        //echo Url::to(['status/create']);
 
        ///if ( $model->load( Yii::$app->request->post() ) && $model->validate()) {
        /*if ( $model->load( Yii::$app->request->post() ) ) {
            // valid data received in $mod> Yii::$app
            print_r( Yii::$app->request->post() );
            exit;
            return $this->render('view', array('model' => $model, 'app' => Yii::$app ) );
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('create', array('model' => $model, 'app' => Yii::$app ) );
        }
        */
        //$session = Yii::$app->session;
        //$session->set('data', 'My data');
        return $this->render('create', array( 'app' => Yii::$app ) );
    }

    public function actionSave()
    {
    	echo "In the save method";
    	print_r( Yii::$app->request->post() );
        exit;	
    }


    /***
    Login in the app
    */
    public function actionLoginform()
    {
        $this->layout = 'login';
        return $this->render('login', array('app' => Yii::$app ) );

        /*if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }*/

      
    }

    public function actionLogin(){
        $model = new Login();
        //print_r(Yii::$app->request->post());
        //exit;
        $data = $model->load(Yii::$app->request->post());
        $msg = "";
        //print_r($model);
        if (  $model->login()) {
            // Get the actual logged user
            //echo "login";
            //print_r( Yii::$app->user->getIdentity() );
            //exit;
            //Yii::$app->user->getIdentity()
           
            //return $this->goBack();
            //return $this->actionIndex();
            $this->redirect(array('server/index')); 
        }
        else{
            $msg = "Please verify  user and password.";
        }

        $this->layout = 'login';
        return $this->render('login', array( 'model' => $model, 'msg' => $msg  ) );
    }

    public function actionLogout(){
       
        Yii::$app->user->logout();
        return $this->actionLoginform();
        //return $this->render('login', ['model' => $model, ]);
    }
}
?> 
 