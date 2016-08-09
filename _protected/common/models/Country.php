<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $abbr
 * @property string $name
 * @property string $long_name
 * @property string $phone_code
 * @property integer $is_active
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abbr', 'name'], 'required'],
            [['is_active'], 'integer'],
            [['abbr', 'phone_code'], 'string', 'max' => 5],
            [['name', 'long_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/labels', 'id'),
            'abbr' => Yii::t('app/labels', 'abbr'),
            'name' => Yii::t('app/labels', 'name'),
            'long_name' => Yii::t('app/labels', 'long_name'),
            'phone_code' => Yii::t('app/labels', 'phone_code'),
            'is_active' => Yii::t('app/labels', 'is_active'),
        ];
    }
}
