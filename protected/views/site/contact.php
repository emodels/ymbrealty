<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#lnk_home').removeClass('active_link').addClass('link'); 
    $('#lnk_contact').removeClass('link').addClass('active_link'); 
    $('#img_home').attr('src', '<?php echo Yii::app()->baseUrl; ?>/images/sun_1.jpg');
    $('#img_contact').attr('src', '<?php echo Yii::app()->baseUrl; ?>/images/sun_2.jpg');
});
</script>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contact-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <h1 style="font-size: 22px; padding: 10px"><b>Contact Us</b></h1>
    <?php if ($Is_display_alert){ ?>
    <div style="color: red; font-size: 20px; padding: 0 0 10px 10px">Thank you for contacting us. We will respond to you as soon as possible.</div>
    <?php } ?>
    <div class="row" style="position: relative; padding: 20px; margin-left: 10px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px">
        <div class="row">
            <div class="column" style="width: 200px"><b>Name</b></div>
            <div class="column"><?php echo $form->textField($model, 'name', array('style'=>'width: 400px')); ?><?php echo $form->error($model, 'name', array('style'=>'width: 400px')); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Address</b></div>
            <div class="column"><?php echo $form->textField($model, 'address', array('style'=>'width: 400px')); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Skype or Contact no</b></div>
            <div class="column"><?php echo $form->textField($model, 'contact_number', array('style'=>'width: 200px')); ?><?php echo $form->error($model, 'contact_number', array('style'=>'width: 200px')); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Email Address</b></div>
            <div class="column"><?php echo $form->textField($model, 'email', array('style'=>'width: 200px')); ?><?php echo $form->error($model, 'email', array('style'=>'width: 200px')); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Message</b></div>
            <div class="column"><?php echo $form->textArea($model, 'message', array('rows'=>4, 'style'=>'width: 400px')); ?><?php echo $form->error($model, 'message', array('style'=>'width: 400px')); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px">&nbsp;</div>
            <div class="column"><input type="submit" value="Submit Your Enquiry" class="button_orange" style="padding: 10px; font-size: 20px; cursor: pointer"/></div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>    
