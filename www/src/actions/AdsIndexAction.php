<?php

namespace app\actions;

use app\providers\CacheActiveDataProvider;
use yii\data\Sort;

/**
 * Class AdsIndexAction
 * @package app\actions
 */
class AdsIndexAction extends \yii\rest\IndexAction
{

    /** @var int  */
    public int $defaultPageSize = 10;

    /** @var int  */
    public int $countQueryCacheTime = 20;

    /**
     * @return \yii\data\ActiveDataProvider|\yii\data\DataFilter|null
     */
    protected function prepareDataProvider()
    {
        $requestParams = \Yii::$app->getRequest()->getQueryParams();
        return new CacheActiveDataProvider([
            'query' => $query = $this->modelClass::find(),
            'countQueryCacheTime' => $this->countQueryCacheTime,
            'pagination' => [
                'params' => $requestParams,
                'defaultPageSize' => $this->defaultPageSize
            ],
            'sort' => [
                'params' => $requestParams,
                'attributes' => [
                    'price',
                    'created_at'
                ]
            ]
        ]);
    }
}