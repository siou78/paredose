<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "user_to_user_role".
 *
 * @property integer $user_id
 * @property integer $user_role_id
 * @property string $active
 * @property string $created_at
 *
 * @property User $user
 * @property UserRole $userRole
 */
class UserToUserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_to_user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_role_id'], 'required'],
            [['user_id', 'user_role_id'], 'integer'],
            //[['created_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::className(), 'targetAttribute' => ['user_role_id' => 'id']],
        ];
    }

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app/labels', 'user_id'),
            'user_role_id' => Yii::t('app/labels', 'user_role_id'),
            'created_at' => Yii::t('app/labels', 'created_at'),
            'active' => Yii::t('app/labels', 'active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRole()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'user_role_id']);
    }
}
