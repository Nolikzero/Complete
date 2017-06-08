<?php

namespace app\widgets;

use yii\base\Widget;

class Location extends Widget
{
    public function run()
    {
        $model = new \app\models\Location();
        $model->load(\Yii::$app->request->post());
        return $this->render('location', compact('model'));
    }
}
