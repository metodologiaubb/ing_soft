<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSerarch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PRODUCTO') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'PRECIO') ?>

    <?= $form->field($model, 'VIDA_RESTANTE') ?>

    <?= $form->field($model, 'ABREVIATURA') ?>

    <?php // echo $form->field($model, 'DESCRIPCION') ?>

    <?php // echo $form->field($model, 'ESTADO') ?>

    <?php // echo $form->field($model, 'ID_USUARIO') ?>

    <?php // echo $form->field($model, 'ID_MARCA') ?>

    <?php // echo $form->field($model, 'ID_CATEGORIA') ?>

    <?php // echo $form->field($model, 'ID_IMAGEN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
