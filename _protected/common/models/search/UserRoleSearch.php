<?php
namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserRole;

/**
 * UserRoleSearch represents the model behind the search form about `\common\models\UserRole`.
 */
class UserRoleSearch extends UserRole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rank'], 'integer'],
            [['name', 'sys_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = UserRole::find();
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort = [
            'defaultOrder' => [
                'created_at' => SORT_DESC,
            ],
        ];

        $dataProvider->pagination = [
            'pageSize' => 30,
        ];

        /*
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        */
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rank' => $this->rank,
            //'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sys_name', $this->sys_name]);

        return $dataProvider;
    }
}
