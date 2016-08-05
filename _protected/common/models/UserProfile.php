<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
// use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['firstname', 'lastname'], 'filter', 'filter' => 'trim'],
            //[['user_id'], 'required'],
            //[['user_id'], 'integer'],
            //[['created_at', 'updated_at'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 100],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
                'updatedAtAttribute' => 'updated_at',
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
            'firstname' => Yii::t('app/labels', 'firstname'),
            'lastname' => Yii::t('app/labels', 'lastname'),
            'created_at' => Yii::t('app/labels', 'created_at'),
            'updated_at' => Yii::t('app/labels', 'updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
