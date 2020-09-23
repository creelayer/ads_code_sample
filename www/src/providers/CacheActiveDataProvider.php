<?php

namespace app\providers;

use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\db\QueryInterface;

/**
 * Class CacheActiveDataProvider
 * @package app\providers
 */
class CacheActiveDataProvider extends ActiveDataProvider
{

    public int $countQueryCacheTime = -1;

    /**
     * @inheritDoc
     */
    protected function prepareTotalCount()
    {
        if (!$this->query instanceof QueryInterface) {
            throw new InvalidConfigException('The "query" property must be an instance of a class that implements the QueryInterface e.g. yii\db\Query or its subclasses.');
        }
        $query = clone $this->query;
        return (int) $query->limit(-1)->offset(-1)->orderBy([])->cache($this->countQueryCacheTime)->count('*', $this->db);
    }
}