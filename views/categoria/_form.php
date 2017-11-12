<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form  col-lg-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPCION')->widget(\edofre\ckeditor\CKEditor::className(), [
        'editorOptions' => [
            'language' => 'es',
        ],
    ])->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'STOCK')->textInput() ?>

    <?= $form->field($model, 'ABREVIATURA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IMAGEN')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16/9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ])->label('Imagen')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
