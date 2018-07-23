<?php
/**
 * Created by PhpStorm.
 * User: bittersweet
 * Date: 2018/7/22
 * Time: 上午10:28
 */

use yii\helpers\Html;
?>

<div class="post">
    <div class="title">
        <h2><a href="<?= $model->url;?>"><?=Html::encode($model->title);?></a></h2>
    </div>
    <div class="author">
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
        <?=date('Y-m-d H:i:s',$model->create_time);?>
        &nbsp&nbsp&nbsp
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        <?=Html::encode($model->author->nickname);?>
    </div>
    <div class="content">
        <?=Html::encode($model->mainContent);?>
    </div>
    <div class="navigation">
        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
        <?=implode(', ',$model->tagLinks);?>
        <br>
        <?=Html::a("评论({$model->commentCount})",$model->url.'#comments')?>
        |最后修改于 <?=Html::encode(date("Y-m-d H:i:s",$model->update_time));?>
    </div>

</div>
