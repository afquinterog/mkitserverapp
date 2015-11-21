<?php
namespace app\controllers;
 
use Yii;
use yii\web\Controller;
use app\models\Status;
use yii\helpers\Url;
 
class StatusController extends Controller
{

    public function actionIndex(){
        $model = new Status;
        $model->find();

        //return $this->render('create', array('model' => $model, 'app' => Yii::$app ) );
    }

    public function actionCreate()
    {
        $model = new Status;

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
        return $this->render('create', array('model' => $model, 'app' => Yii::$app ) );
    }

    public function actionSave()
    {
    	echo "In the save method";
    	print_r( Yii::$app->request->post() );
        exit;	
    }
}
?> 
 