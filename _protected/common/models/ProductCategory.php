<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $sys_name
 * @property integer $rank
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product[] $products
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sys_name'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['name', 'sys_name'], 'filter', 'filter' => 'trim'],
            [['name', 'sys_name'], 'required'],
            [['rank'], 'integer'],
            //[['created_at', 'updated_at'], 'safe'],
            [['name', 'sys_name'], 'string', 'min' => 2, 'max' => 50],
            [['sys_name'], 'unique'],
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
     * app/labels location folder in /_protected/common/translations/en_US/
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/labels', 'id'),
            'name' => Yii::t('app/labels', 'name'),
            'sys_name' => Yii::t('app/labels', 'sys_name'),
            'rank' => Yii::t('app/labels', 'rank'),
            'created_at' => Yii::t('app/labels', 'created_at'),
            'updated_at' => Yii::t('app/labels', 'updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_category_id' => 'id']);
    }
}
