<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DateRangePicker;
use app\models\Authors;

/* @var $this yii\web\View */
/* @var $model app\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date_from')->widget(DateRangePicker::className(), [
        'attributeTo' => 'date_to',
        'form' => $form, // best for correct client validation
        'language' => Yii::$app->language,
        'labelTo' => Yii::t('app', 'to'),
        'size' => 'lg',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'author_id')->dropDownList(Authors::forFilter(), ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary pull-right']) ?>
        <div class="clearfix"></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
