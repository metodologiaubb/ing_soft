<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSerarch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSerarch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PRODUCTO', 'ID_USUARIO', 'ID_MARCA', 'ID_CATEGORIA', 'ID_IMAGEN'], 'integer'],
            [['NOMBRE', 'VIDA_RESTANTE', 'ABREVIATURA', 'DESCRIPCION', 'ESTADO'], 'safe'],
            [['PRECIO'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Producto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_PRODUCTO' => $this->ID_PRODUCTO,
            'PRECIO' => $this->PRECIO,
            'ID_USUARIO' => $this->ID_USUARIO,
            'ID_MARCA' => $this->ID_MARCA,
            'ID_CATEGORIA' => $this->ID_CATEGORIA,
            'ID_IMAGEN' => $this->ID_IMAGEN,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'VIDA_RESTANTE', $this->VIDA_RESTANTE])
            ->andFilterWhere(['like', 'ABREVIATURA', $this->ABREVIATURA])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'ESTADO', $this->ESTADO]);

        return $dataProvider;
    }
}
