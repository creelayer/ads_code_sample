<?php

namespace app\controllers;

use app\actions\AdsIndexAction;
use app\models\Ads;
use yii\rest\ActiveController;

/**
 * Class AdsController
 * @package app\controllers
 */
class AdsController extends ActiveController
{

    /** @var string */
    public $modelClass = Ads::class;

    /** @var string */
    public $createScenario = Ads::CREATE_SCENARIO;

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['class'] = AdsIndexAction::class;
        return $actions;
    }

}