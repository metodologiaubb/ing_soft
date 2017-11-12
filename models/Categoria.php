<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Categoria".
 *
 * @property int $ID_CATEGORIA
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property int $STOCK
 * @property string $ABREVIATURA
 * @property int $IMAGEN
 *
 * @property Producto[] $productos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE', 'DESCRIPCION', 'STOCK', 'ABREVIATURA', 'IMAGEN'], 'required'],
            [['STOCK', 'IMAGEN'], 'integer'],
            [['NOMBRE', 'DESCRIPCION'], 'string', 'max' => 250],
            [['ABREVIATURA'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CATEGORIA' => 'Id  Categoria',
            'NOMBRE' => 'Nombre',
            'DESCRIPCION' => 'Descripcion',
            'STOCK' => 'Stock',
            'ABREVIATURA' => 'Abreviatura',
            'IMAGEN' => 'Imagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['ID_CATEGORIA' => 'ID_CATEGORIA']);
    }
}
