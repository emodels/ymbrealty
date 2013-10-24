<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('input').change(function(){
        ValidateErrors();
    });
});

function ValidateErrors(){
    var count = 0;
    for (i = 1; i <= 5; i++) {
        $('#proprty_' + i + '_em_').css('display','none');
        $('#proprty_' + i).parent().removeClass('error');
        if($('#proprty_' + i).val()==''){
            $('#proprty_' + i).parent().addClass('error');
            $('#proprty_' + i + '_em_').css('display','block');
            count++;
        }
    }
    
    if(count > 0){
        return true;
    } else {
        return false;
    }
}

function formSend(){
    if (ValidateErrors()){
        hasError = true;
    } else {
        hasError = false;
    }
    
    if (!hasError){
        $('#featured-form').submit();
    } else {
        $(window).scrollTop($('.column .error :first').offset().top);
        return false;
    }
}
</script>
<style type="text/css">
#menu_featured_property{
background-image: -ms-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: -moz-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: -o-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #559ABD), color-stop(1, #002A3D));
background-image: -webkit-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: linear-gradient(to bottom, #559ABD 0%, #002A3D 100%);
}
</style>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'featured-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            
        ),
    ));
    ?>
    <h1 style="font-size: 22px; padding: 10px"><b>Featured Property</b></h1>
    <div class="row" style="position: relative; padding: 20px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px">
        <p>Please enter valid Property #ID in following featured fields</p>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Featured - #1 :</b></div>
            <div class="column">
                <?php echo CHtml::textField('proprty[1]', $model['proprty_1'], array('style'=>'width: 140px')); ?>
                <div style="width: auto; display: none" class="errorMessage" id="proprty_1_em_">Cannot be blank.</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Featured - #2 :</b></div>
            <div class="column">
                <?php echo CHtml::textField('proprty[2]', $model['proprty_2'], array('style'=>'width: 140px')); ?>
                <div style="width: auto; display: none" class="errorMessage" id="proprty_2_em_">Cannot be blank.</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Featured - #3 :</b></div>
            <div class="column">
                <?php echo CHtml::textField('proprty[3]', $model['proprty_3'], array('style'=>'width: 140px')); ?>
                <div style="width: auto; display: none" class="errorMessage" id="proprty_3_em_">Cannot be blank.</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Featured - #4 :</b></div>
            <div class="column">
                <?php echo CHtml::textField('proprty[4]', $model['proprty_4'], array('style'=>'width: 140px')); ?>
                <div style="width: auto; display: none" class="errorMessage" id="proprty_4_em_">Cannot be blank.</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Featured - #5 :</b></div>
            <div class="column">
                <?php echo CHtml::textField('proprty[5]', $model['proprty_5'], array('style'=>'width: 140px')); ?>
                <div style="width: auto; display: none" class="errorMessage" id="proprty_5_em_">Cannot be blank.</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px">&nbsp;</div>
            <div class="column"><input type="button" onclick="javascript:formSend();" value="Save changes" class="button_orange" style="padding: 10px; font-size: 20px; cursor: pointer"/></div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>    
