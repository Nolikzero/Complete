<?
use yii\widgets\Pjax,
    yii\bootstrap\ActiveForm,
    yii\helpers\ArrayHelper;
?>
<? Pjax::begin(['id' => 'location_pjax', 'enableReplaceState' => false, 'enablePushState' => false]) ?>
<? $form = ActiveForm::begin(['id' => 'location_form', 'options' => ['data-pjax' => true]]); ?>
<div class="col-md-<? if ($model->cities): ?>6<? else: ?>12<? endif ?>">
    <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map($model->countries, 'id', 'name'), ['prompt' => 'Выберите страну', 'class' => 'form-control'])->label(false); ?>
</div>
<? if ($model->cities): ?>
    <div class="col-md-6">
        <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map($model->cities, 'id', 'name'), ['prompt' => 'Выберите город', 'class' => 'form-control'])->label(false); ?>
    </div>
<? endif ?>
<? if ($model->country || $model->city): ?>
    <div class="col-md-12 text-center location_block">
        <? if ($model->country): ?>
            <h3>Ваша страна : <?= $model->country->name ?></h3>
        <? endif ?>
        <? if ($model->city): ?>
            <h3>Ваша город : <?= $model->city->name ?></h3>
        <? endif ?>
    </div>
<? endif ?>
<? ActiveForm::end(); ?>
<? Pjax::end(); ?>
