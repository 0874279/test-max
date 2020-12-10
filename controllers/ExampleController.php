<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ExampleController extends Controller
{
  public function actionSay($message = 'empty')
  {
    return $this->render('say', ['message' => $message]);
  }
}