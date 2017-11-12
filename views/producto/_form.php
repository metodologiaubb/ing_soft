<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
$catego= array();
foreach($categ as $row){
    $catego[$row->ID_CATEGORIA]= $row->NOMBRE;
}
$marc=array();
foreach ($marcas as $row){
    $marc[$row->ID_MARCA]=$row->NOMBRE;
}
?>

<div class="producto-form col-lg-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRECIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VIDA_RESTANTE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ABREVIATURA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPCION')->widget(\edofre\ckeditor\CKEditor::className(), [
        'editorOptions' => [
            'language' => 'es',
        ],
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTADO')->widget(\edofre\ckeditor\CKEditor::className(), [
        'editorOptions' => [
            'language' => 'es',
        ],
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_MARCA')->dropDownList($marc)->label('Categoria')->label('Marca') ?>

    <?= $form->field($model, 'ID_CATEGORIA')->dropDownList($catego)->label('Categoria')->label('Categoria') ?>

    <?= $form->field($model, 'ID_IMAGEN')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16/9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ])->label('Imagen')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
