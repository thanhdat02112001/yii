<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Post';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php $form = ActiveForm::begin(); ?>

                <?php echo $form->field($post, 'title')->textInput(array('class' => 'form-control')); ?>
                <?php echo $form->field($post, 'content')->textArea(array('class' => 'form-control')); ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
