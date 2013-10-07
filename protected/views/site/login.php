<?php
$this->pageTitle = Yii::app()->name . ' - Login';
?>

<div class="row" style="text-align: center">
    <div style="display: inline-block">
        <div class="column"><img src="<?php echo Yii::app()->baseUrl; ?>/images/login_photo.png" /></div>
        <div class="column" style="padding-top: 25px"><h1>User Login</h1></div>
        <div class="clearfix"></div>
    </div>
</div>
<div style="text-align: center">
    <div class="form login_box" style="text-align: left; width: 290px; padding-bottom: 10px; display: inline-block">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
                ));
        ?>
        <div class="row">
            <div class="column" style="padding-top: 5px; width: 100px"><b>User Name</b></div>
            <div class="column"><?php echo $form->textField($model, 'username'); ?><?php echo $form->error($model, 'username', array('style'=>'width: 150px')); ?></div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="column" style="padding-top: 5px; width: 100px"><b>Password</b></div>
            <div class="column"><?php echo $form->passwordField($model, 'password'); ?><?php echo $form->error($model, 'password', array('style'=>'width: 150px')); ?></div>
            <div class="clearfix"></div>
        </div>

        <div class="row rememberMe">
            <div class="column" style="padding-left: 110px"><?php echo $form->checkBox($model, 'rememberMe'); ?></div>
            <div class="column" style="padding-top: 2px"><label>Remember me</label><?php echo $form->error($model, 'rememberMe', array('style'=>'width: 150px')); ?></div>
            <div class="clearfix"></div>
        </div>

        <div class="row buttons">
            <div class="column" style="padding-left: 108px; padding-top: 5px"><?php echo CHtml::submitButton(' Login ', array('class' => 'gradient_gray_box', 'style'=>'font-size:14px; font-weight: bold; padding: 10px 20px 10px 20px; cursor: pointer')); ?></div>
            <div class="clearfix"></div>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>
