<?php
namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;
use common\models\UserMember;
use common\models\Country;

/**
 * UserMemberSearch represents the model behind the search form about `\common\models\UserMember`.
 */
class UserMemberSearch extends UserMember
{
    public $id;
    public $firstname;
    public $lastname;
    public $fullname;
    public $email;
    public $country;
    public $active;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'active'], 'integer'],
            [['email', 'firstname', 'lastname', 'fullname', 'country', 'mobile', 'created_at', 'updated_at'], 'safe'],
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
        /*SELECT *
        FROM user u
        LEFT JOIN user_member um ON u.id = um.user_id 
        LEFT JOIN user_profile up ON u.id = up.user_id
        LEFT JOIN user_to_user_role utur ON u.id = utur.user_id
        LEFT JOIN user_role ur ON ur.id = utur.user_role_id
        WHERE ur.sys_name = 'member'*/

        $query = User::find()
                ->joinWith(['userMember userMember', 'userProfile userProfile', 'userToUserRoles userToUserRoles'])
                ->leftJoin(['user_role'], 'userToUserRoles.user_role_id = user_role.id')
                ->where(['user_role.sys_name' => 'member', 'userToUserRoles.active' => 1]);
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort = [
            'defaultOrder' => [
                'userMember.created_at' => SORT_DESC,
            ],
            'attributes' => [
                'id',
                'email',
                'username',
                'mobile',
                'firstname',
                'lastname',
                // 'country',
                'country' => [
                    'asc' => ['userMember.country_id' => SORT_ASC],
                    'desc' => ['userMember.country_id' => SORT_DESC],
                ],
                'active',
                'userMember.created_at' => [
                    'asc' => ['userMember.created_at' => SORT_ASC],
                    'desc' => ['userMember.created_at' => SORT_DESC],
                ],
                'fullname' => [
                    'asc' => ['userProfile.lastname' => SORT_ASC, 'userProfile.firstname' => SORT_ASC],
                    'desc' => ['userProfile.lastname' => SORT_DESC, 'userProfile.firstname' => SORT_DESC],
                ]
            ]
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
            'user.id' => $this->id,
            'active' => $this->active,
            'userMember.country_id' => $this->country,
            'userMember.created_at' => $this->created_at,
            'userMember.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'userMember.mobile', $this->mobile]);

        $query->andFilterWhere(['like', 'userMember.country_id', $this->country_id]);

        $query->andFilterWhere(['like', 'userProfile.firstname', $this->firstname]);
        $query->andFilterWhere(['like', 'userProfile.lastname', $this->lastname]);

        return $dataProvider;
    }
}
