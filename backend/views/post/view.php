<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章修改', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',

            'tags:ntext',
            ['attribute'=>'status',
            'value'=>$model->status0->name],
            ['attribute'=>'create_time',
            'format'=>['date','php:Y-m-d H:i:s']],
            ['attribute'=>'update_time',
            'format'=>['date','php:Y-m-d H:i:s']],
            ['attribute'=>'author_id',
            'value'=>$model->author->nickname,
            'label'=>'作者'],
            'content:ntext',
        ],
    ]) ?>

</div>
