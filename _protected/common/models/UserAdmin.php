<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
// use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "user_admin".
 *
 * @property integer $user_id
 * @property string $reg_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class UserAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reg_id'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['reg_id'], 'filter', 'filter' => 'trim'],
            //[['user_id'], 'required'],
            //[['user_id'], 'integer'],
            //[['created_at', 'updated_at'], 'safe'],
            [['reg_id'], 'string', 'min' => 4 , 'max' => 20],
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
            'reg_id' => Yii::t('app/labels', 'reg_id'),
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
