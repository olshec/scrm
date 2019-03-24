<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<?php if ($model) {?>
<div class="alert alert-success">
	Model ready to be saved! <br /> <br /> These are values: <br />
    Floor: <?php echo $model->floor; ?> <br />
    Room Number: <?php echo $model->room_number; ?> <br />
    Has conditioner: <?php

    echo Yii::$app->formatter->asBoolean($model->has_conditioner);
    ?> <br />
    Has TV: <?php

    echo Yii::$app->formatter->asBoolean($model->has_tv);
    ?> <br />
    Has phone: <?php

    echo Yii::$app->formatter->asBoolean($model->has_phone);
    ?> <br />
    Available from (mm/dd/yyyy): <?php

    echo Yii::$app->formatter->asDate($model->available_from, 'php:m/d/Y');
    ?> <br />
    Price per day: <?php

    echo Yii::$app->formatter->asCurrency($model->price_per_day, 'EUR');
    ?> <br />
    Image:
    <?php if (isset($model->fileImage)) {?>
    <img
		src="<?php

        echo Url::to('@uploadedfilesdir/' . $model->fileImage->name)?>" />
    <?php }?>
</div>
<?php }?>
<?php

$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]);
?>

<div class="row">
	<div class="col-lg-6">
		<h2>Create a new room</h2>
           <?php echo $this->render('_form', ['model' => $model]); ?>
        </div>
</div>
<div class="form-group">
		<?=Html::submitButton('Create', ['class' => 'btn btn-success'])?>
	</div>
<?php ActiveForm::end();?>