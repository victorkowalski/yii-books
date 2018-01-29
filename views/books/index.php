<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Books'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterRowOptions' => [
            'style' => 'display: none;'
        ],
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'preview',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a(Html::img($model->preview), $model->preview, ['class' => 'gallery']);
                }
            ],
            [
                'attribute' => 'author_id',
                'value' => function ($model) {
                    return $model->author->fullName;
                }
            ],
            [
                'attribute' => 'date',
                'value' => function ($model) {
                    return $model->getHumanDate('date');
                }
            ],
            [
                'attribute' => 'date_create',
                'value' => function ($model) {
                    return $model->getHumanDate('date_create');
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 70px;'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            ['view', 'id' => $model->id],
                            ['class' => 'showInModal', 'title' => $model->name]
                        );
                    },
                ]
            ],
        ],
    ]); ?>

    <?php Modal::begin([
        'id' => 'modal',
        'header' => '<h4 class="modal-title"></h4>'
    ]);?>
    <?php Modal::end();?>

</div>
