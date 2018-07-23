<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\PostStatus;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['attribute'=>'id',
                'contentOptions'=>['width'=>'2px'],
            ],

            'title',
            [
              'attribute'=>'authorName',
                'value'=>'author.nickname',
                'label'=>'作者',

            ]
            ,
            'tags:ntext',
            ['attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>PostStatus::find()->select(['name','id'])->orderBy('position')->indexBy('id')->column(),

                ],
            //'create_time:datetime',
            ['attribute' => 'update_time',
             'format' => ['date','php:Y-m-d H:i:s']
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
