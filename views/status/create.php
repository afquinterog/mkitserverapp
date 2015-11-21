<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use app\models\Status;
  use yii\helpers\Url;
?>
                                      
<form method="post" action="<?php echo Url::to(['status/save']); ?>" enctype="multipart/form-data">
	<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />

    <div class="form-group field-status-text required">
		<label for="status-text" class="control-label">Status Update</label>
		<textarea rows="4" name="Status[text]" class="form-control" id="status-text"></textarea>
		<div class="help-block"></div>
	</div>

	<div class="form-group field-status-permissions required">
		<label for="status-permissions" class="control-label">Permissions</label>
		<select name="Status[permissions]" class="form-control" id="status-permissions">
			<option value="">- Choose Your Permissions -</option>
			<option value="10">Private</option>
			<option value="20">Public</option>
		</select>
		<div class="help-block"></div>
	</div>
		    

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>    
    </div>

</form>

