<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSerarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PRODUCTO',
            'NOMBRE',
            'PRECIO',
            'VIDA_RESTANTE',
            'ABREVIATURA',
            //'DESCRIPCION',
            //'ESTADO',
            //'ID_USUARIO',
            //'ID_MARCA',
            //'ID_CATEGORIA',
            //'ID_IMAGEN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
