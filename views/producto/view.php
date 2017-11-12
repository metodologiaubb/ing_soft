<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->ID_PRODUCTO;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID_PRODUCTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID_PRODUCTO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que quiere eliminar este objeto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PRODUCTO',
            'NOMBRE',
            'PRECIO',
            'VIDA_RESTANTE',
            'ABREVIATURA',
            'DESCRIPCION',
            'ESTADO',
            'ID_USUARIO',
            'ID_MARCA',
            'ID_CATEGORIA',
            'ID_IMAGEN',
        ],
    ]) ?>

</div>
