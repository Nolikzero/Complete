<?php

/* @var $this yii\web\View */

$this->title = 'App';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>App</h1>
    </div>

    <div class="body-content">

        <div clas="col-md-12">
            <div class="row">
                <?= \app\widgets\Location::widget() ?>
            </div>
        </div>

    </div>
</div>
