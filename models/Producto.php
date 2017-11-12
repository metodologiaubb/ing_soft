<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Producto".
 *
 * @property int $ID_PRODUCTO
 * @property string $NOMBRE
 * @property string $PRECIO
 * @property string $VIDA_RESTANTE
 * @property string $ABREVIATURA
 * @property string $DESCRIPCION
 * @property string $ESTADO
 * @property int $ID_USUARIO
 * @property int $ID_MARCA
 * @property int $ID_CATEGORIA
 * @property int $ID_IMAGEN
 *
 * @property Usuario $uSUARIO
 * @property Marca $mARCA
 * @property Categoria $cATEGORIA
 * @property Registra[] $registras
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE', 'PRECIO', 'VIDA_RESTANTE', 'ABREVIATURA', 'DESCRIPCION', 'ESTADO', 'ID_USUARIO', 'ID_MARCA', 'ID_CATEGORIA', 'ID_IMAGEN'], 'required'],
            [['PRECIO'], 'number'],
            [['ID_USUARIO', 'ID_MARCA', 'ID_CATEGORIA', 'ID_IMAGEN'], 'integer'],
            [['NOMBRE', 'VIDA_RESTANTE', 'DESCRIPCION', 'ESTADO'], 'string', 'max' => 250],
            [['ABREVIATURA'], 'string', 'max' => 50],
            [['ID_USUARIO'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['ID_USUARIO' => 'ID_USUARIO']],
            [['ID_MARCA'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['ID_MARCA' => 'ID_MARCA']],
            [['ID_CATEGORIA'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['ID_CATEGORIA' => 'ID_CATEGORIA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PRODUCTO' => 'Id  Producto',
            'NOMBRE' => 'Nombre',
            'PRECIO' => 'Precio',
            'VIDA_RESTANTE' => 'Vida  Restante',
            'ABREVIATURA' => 'Abreviatura',
            'DESCRIPCION' => 'Descripcion',
            'ESTADO' => 'Estado',
            'ID_USUARIO' => 'Id  Usuario',
            'ID_MARCA' => 'Id  Marca',
            'ID_CATEGORIA' => 'Id  Categoria',
            'ID_IMAGEN' => 'Id  Imagen',
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
    public function getMARCA()
    {
        return $this->hasOne(Marca::className(), ['ID_MARCA' => 'ID_MARCA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCATEGORIA()
    {
        return $this->hasOne(Categoria::className(), ['ID_CATEGORIA' => 'ID_CATEGORIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistras()
    {
        return $this->hasMany(Registra::className(), ['ID_PRODUCTO' => 'ID_PRODUCTO']);
    }
}
