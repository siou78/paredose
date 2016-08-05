<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $product_category_id
 * @property string $name
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProductCategory $productCategory
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['name'], 'filter', 'filter' => 'trim'],
            [['product_category_id', 'name'], 'required'],
            [['product_category_id'], 'integer'],
            [['name'], 'string', 'min' => 2, 'max' => 100],
            [['price'], 'number'],
            //[['created_at', 'updated_at'], 'safe'],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'id']],
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
            'id' => Yii::t('app/labels', 'id'),
            'product_category_id' => Yii::t('app/labels', 'product_category_id'),
            'name' => Yii::t('app/labels', 'name'),
            'price' => Yii::t('app/labels', 'price'),
            'created_at' => Yii::t('app/labels', 'created_at'),
            'updated_at' => Yii::t('app/labels', 'updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'product_category_id']);
    }
}
