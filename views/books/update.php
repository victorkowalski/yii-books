<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Books',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id], 'class' => 'showInModal', 'title' => $model->name];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php Modal::begin([
        'id' => 'modal',
        'header' => '<h4 class="modal-title"></h4>'
    ]);?>
    <?php Modal::end();?>

</div>
