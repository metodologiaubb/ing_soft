<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Marca".
 *
 * @property int $ID_MARCA
 * @property string $DESCRIPCION
 * @property string $NOMBRE
 * @property int $ID_USUARIO
 *
 * @property Usuario $uSUARIO
 * @property Producto[] $productos
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Marca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DESCRIPCION', 'NOMBRE', 'ID_USUARIO'], 'required'],
            [['ID_USUARIO'], 'integer'],
            [['DESCRIPCION', 'NOMBRE'], 'string', 'max' => 250],
            [['ID_USUARIO'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['ID_USUARIO' => 'ID_USUARIO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MARCA' => 'Id  Marca',
            'DESCRIPCION' => 'Descripcion',
            'NOMBRE' => 'Nombre',
            'ID_USUARIO' => 'Id  Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSUARIO()
    {
        return $this->hasOne(Usuario::className(), ['ID_USUARIO' => 'ID_USUARIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['ID_MARCA' => 'ID_MARCA']);
    }
}
