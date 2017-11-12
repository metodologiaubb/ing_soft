<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property int $ID_USUARIO
 * @property string $NOMBRE
 * @property string $CARGO
 * @property string $TELEFONO
 *
 * @property Marca[] $marcas
 * @property Producto[] $productos
 * @property Solicitud[] $solicituds
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE', 'CARGO', 'TELEFONO'], 'required'],
            [['NOMBRE', 'CARGO', 'TELEFONO'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_USUARIO' => 'Id  Usuario',
            'NOMBRE' => 'Nombre',
            'CARGO' => 'Cargo',
            'TELEFONO' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcas()
    {
        return $this->hasMany(Marca::className(), ['ID_USUARIO' => 'ID_USUARIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['ID_USUARIO' => 'ID_USUARIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['ID_USUARIO' => 'ID_USUARIO']);
    }
}
