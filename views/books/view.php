<?php
use yii\widgets\DetailView;
?>
<div class="books-view">

    <?= DetailView::widget([
        'id' => 'detail-view',
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'preview',
                'format' => 'image'
            ],
            [
                'attribute' => 'author_id',
                'value' => $model->author->fullName
            ],
            [
                'attribute' => 'date',
                'value' => $model->getHumanDate('date')
            ],
            [
                'attribute' => 'date_create',
                'value' => $model->getHumanDate('date_create')
            ],
            [
                'attribute' => 'date_update',
                'value' => $model->getHumanDate('date_update')
            ]
        ],
    ]) ?>

</div>
