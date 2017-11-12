<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property int $ID_USUARIO
 * @property string $NOMBRE
 * @property string $EMAIL
 * @property string $CARGO
 * @property string $TELEFONO
 * @property string $PASSWORD
 * @property string $AUTHKEY
 * @property string $ACCESSTOKEN
 * @property int $ACTIVATE
 * @property int $ROLL
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
            [['NOMBRE', 'EMAIL', 'CARGO', 'TELEFONO', 'PASSWORD', 'AUTHKEY', 'ACCESSTOKEN', 'ROLL'], 'required'],
            [['ACTIVATE', 'ROLL'], 'integer'],
            [['NOMBRE', 'CARGO', 'TELEFONO', 'PASSWORD', 'AUTHKEY', 'ACCESSTOKEN'], 'string', 'max' => 250],
            [['EMAIL'], 'string', 'max' => 80],
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
            'EMAIL' => 'Email',
            'CARGO' => 'Cargo',
            'TELEFONO' => 'Telefono',
            'PASSWORD' => 'Password',
            'AUTHKEY' => 'Authkey',
            'ACCESSTOKEN' => 'Accesstoken',
            'ACTIVATE' => 'Activate',
            'ROLL' => 'Roll',
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
