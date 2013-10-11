<script type="text/javascript">
function ChangeStatus(status, id){
    if (confirm('Do you want to change status to "' + status + '"?')){
        $('#mode').val('status');
        $('#id').val(id);
        $.fn.yiiGridView.update('grid_property', {
            type:'POST',
            data: $('#search-form').serialize(),
            success:function(data) {
                $('#mode').val('');
                $('#id').val('');
                $.fn.yiiGridView.update('grid_property', {type:'POST', data: $('#search-form').serialize()});
            }
        });
    }
}
function ChangeType(type, id){
    if (confirm('Do you want to change type to "' + type + '"?')){
        $('#mode').val('type');
        $('#id').val(id);
        $.fn.yiiGridView.update('grid_property', {
            type:'POST',
            data: $('#search-form').serialize(),
            success:function(data) {
                $('#mode').val('');
                $('#id').val('');
                $.fn.yiiGridView.update('grid_property', {type:'POST', data: $('#search-form').serialize()});
            }
        });
    }
}
function DeleteProperty(id){
    if (confirm('Do you want to Delete this Property?')){
        $('#mode').val('delete');
        $('#id').val(id);
        $.fn.yiiGridView.update('grid_property', {
            type:'POST',
            data: $('#search-form').serialize(),
            success:function(data) {
                $('#mode').val('');
                $('#id').val('');
                $.fn.yiiGridView.update('grid_property', {type:'POST', data: $('#search-form').serialize()});
            }
        });
    }
}
</script>
<style type="text/css">
#menu_search_property{
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
        'id' => 'search-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <h1 style="font-size: 16px"><b>Search Property</b></h1>
    <input type="hidden" id="mode" name="mode" value=""/><input type="hidden" id="id" name="id" value=""/>
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
        <div class="row" style="padding-bottom: 10px">    
            <div class="column" style="width: 150px">Contact # Cell :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'vendor_contact_cell'); ?></div>
            <div class="column" style="width: 150px">Email :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'vendor_email'); ?></div>
            <div class="column" style="width: 150px">CFE meter number :</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'cfe_meter'); ?></div>
            <div class="clearfix"></div>    
        </div>
        <div class="row" style="border-top: solid 1px silver; padding-top: 15px">    
            <div class="column" style="width: 150px">Property #ID</div>
            <div class="column" style="width: 180px"><?php echo $form->textField($model, 'ref_no'); ?></div>
            <div class="column" style="width: 150px">Property Status</div>
            <div class="column" style="width: 180px"><?php echo $form->dropDownList($model, 'status', array('1' => 'Active', '0' => 'Sold'), array('empty' => 'Select Status', 'style' => 'width: 153px')); ?></div>
            <div class="column" style="width: 150px">Property Type :</div>
            <div class="column" style="width: 180px"><?php echo $form->dropDownList($model, 'for_sale', array('1' => 'For Sale', '0' => 'For Rental'), array('empty' => 'Select Type', 'style' => 'width: 153px')); ?></div>
            <div class="clearfix"></div>    
        </div>
        <div style="position: absolute; top: 18px; right: 18px"><input type="submit" value="Search" class="button_orange" style="padding: 10px; font-size: 20px; cursor: pointer"/></div>
    </div>
    <div class="row">
         <?php $this->renderPartial('/admin/_search_grid_view', array('dataProvider' => $dataProvider), false, false); ?>   
    </div>    
    <?php $this->endWidget(); ?>
</div>