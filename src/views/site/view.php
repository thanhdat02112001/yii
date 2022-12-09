<?php

/** @var yii\web\View $this */

$this->title = 'View';
?>
<div class="site-index">
    <a href="/site/index" class="btn btn-primary">back</a>
    <div class="body-content">
       <p>Post ID: <?= $post->id ?></p>
       <p>Post title: <?= $post->title ?></p>
       <p>Post Content: <?= $post->content ?></p>
    </div>
</div>
