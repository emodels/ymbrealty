<script type="text/javascript">
function formSend(form, data, hasError){
    if (!hasError){
        return true;
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
            'validateOnSubmit' => true,
            'afterValidate'=>'js:formSend'
        ),
    ));
    ?>
    <h1 style="font-size: 22px; padding: 10px"><b>Featured Property</b></h1>
    <div class="row" style="position: relative; padding: 20px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px">
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Property - #1</b></div>
            <div class="column">
                <?php echo CHtml::textField('proprty_1', array('style'=>'width: 300px')); ?>
                <div style="width: auto; display: none" class="errorMessage" id="proprty_1_em_">Cannot be blank.</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Property - #2</b></div>
            <div class="column">
                <?php echo CHtml::textField('proprty_2', array('style'=>'width: 300px')); ?>
                <div style="width: auto; display: none" class="errorMessage" id="proprty_2_em_">Cannot be blank.</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px">&nbsp;</div>
            <div class="column"><input type="submit" value="Update Featured Properties" class="button_orange" style="padding: 10px; font-size: 20px; cursor: pointer"/></div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>    
