<?php

namespace app\models;

use app\validators\ArrayValidator;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\validators\EachValidator;
use yii\db\ArrayExpression;

/**
 * This is the model class for table "ads".
 *
 * @property string $title
 * @property string $description
 * @property double $price
 * @property ArrayExpression $photos
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Ads extends \yii\db\ActiveRecord
{

    public const CREATE_SCENARIO = 'create';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required'],
            [['title'], 'string', 'max' => 200],
            ['photos', ArrayValidator::class, 'rule' => ['url'], 'max' => 3],
            [['description'], 'string', 'max' => 1000],
            [['price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::CREATE_SCENARIO] = ['title', 'description', 'photos', 'price'];
        return $scenarios;
    }

    /**
     * @return array|string[]
     */
    public function fields()
    {
        return $this->scenario == self::CREATE_SCENARIO ? ['id'] : [
            'title',
            'photo' => function ($model) {
                return $model->photos instanceof ArrayExpression ? $model->photos->offsetGet(0) : $model->photos;
            },
            'price'
        ];
    }

    public function extraFields()
    {
        return ['description', 'photos'];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('now()'),
            ]
        ];
    }

}
