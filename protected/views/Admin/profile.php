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
#menu_profile{
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
        'id' => 'profile-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate'=>'js:formSend'
        ),
    ));
    ?>
    <h1 style="font-size: 22px; padding: 10px"><b>Edit Profile</b></h1>
    <div class="row" style="position: relative; padding: 20px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px">
        <div class="row" style="padding-top: 10px">
            <div class="column" style="padding-top: 5px; width: 200px"><b>First Name</b></div>
            <div class="column"><?php echo $form->textField($model, 'first_name'); ?><?php echo $form->error($model, 'first_name'); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="padding-top: 5px; width: 200px"><b>Last Name</b></div>
            <div class="column"><?php echo $form->textField($model, 'last_name'); ?><?php echo $form->error($model, 'last_name'); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="padding-top: 5px; width: 200px"><b>Email</b></div>
            <div class="column"><?php echo $form->textField($model, 'email'); ?><?php echo $form->error($model, 'email'); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="padding-top: 5px; width: 200px"><b>User Name</b></div>
            <div class="column"><?php echo $form->textField($model, 'username'); ?><?php echo $form->error($model, 'username'); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="padding-top: 5px; width: 200px"><b>Password</b></div>
            <div class="column"><?php echo $form->passwordField($model, 'password'); ?><?php echo $form->error($model, 'password'); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="padding-top: 5px; width: 200px"><b>Confirm Password</b></div>
            <div class="column"><?php echo $form->passwordField($model, 'conf_password'); ?><?php echo $form->error($model, 'conf_password'); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row buttons" style="padding-top: 10px">
            <div class="column" style="padding-left: 208px"><?php echo CHtml::submitButton('Update Profile', array('class' => 'button_orange', 'style' => 'padding: 10px; font-size: 20px; cursor: pointer; width:155px')); ?></div>
            <div class="clearfix"></div>
        </div>    
    </div>
    <?php $this->endWidget(); ?>
</div>    
