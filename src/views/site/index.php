<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <a href="/site/create" class="btn btn-primary">create</a>
        <div class="row">
           <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($posts as $post):  ?>
                        <tr>
                            <td><?php echo Html::a($post->id, array('site/view', 'id'=>$post->id)); ?></td>
                            <td><?= $post->title ?></td>
                            <td><?= $post->content ?></td>
                            <td>
                                <?php echo Html::a('Update', array('site/update', 'id'=>$post->id), ['class' =>'btn btn-info']); ?>
                                <?php echo Html::a('Delete', array('site/delete', 'id'=>$post->id), ['class' =>'btn btn-danger']); ?>
                            </td>
                        </tr>
                    <? endforeach; ?>
                </tbody>
           </table>
        </div>

    </div>
</div>
