<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PostStatus;
use common\models\Adminuser;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
       $psObjs=PostStatus::find()->all();
       $status=ArrayHelper::map($psObjs,'id','name');
    ?>
    <?= $form->field($model, 'status')->dropDownList($status,['prompt'=>'请选择状态']); ?>


<?php
      $authors=Adminuser::find()->all();
      $allAuthors=ArrayHelper::map($authors,'id','nickname');
?>
    <?= $form->field($model, 'author_id')->dropDownList($allAuthors,['prompt'=>'请选择作者']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
