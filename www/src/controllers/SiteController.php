<?php

namespace app\controllers;

use yii\rest\Controller;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{

    /**
     * @return array
     */
    public function actionIndex()
    {
        return ['index'];
    }

}