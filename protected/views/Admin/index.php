<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <h1 style="font-size: 16px"><b>Search Property</b></h1>
    <div class="row" style="position: relative; padding: 10px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px">
        <div class="row">
            <div class="column" style="width: 150px">Property Address :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'property_address'); ?></div>
            <div class="column" style="width: 150px">Vendor name :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'vendor_name'); ?></div>
            <div class="column" style="width: 150px">Contact # Home :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'vendor_contact_home'); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row">    
            <div class="column" style="width: 150px">Contact # Cell :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'vendor_contact_cell'); ?></div>
            <div class="column" style="width: 150px">Email :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'vendor_email'); ?></div>
            <div class="column" style="width: 150px">CFE meter number :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'cfe_meter'); ?></div>
            <div class="clearfix"></div>    
        </div>
        <div style="position: absolute; top: 18px; right: 18px"><input type="submit" value="Search" class="button_orange" style="padding: 10px; font-size: 20px; cursor: pointer"/></div>
    </div>
    <?php $this->endWidget(); ?>
</div>