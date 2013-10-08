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
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'grid_property',
            'dataProvider' => $dataProvider,
            'ajaxUpdate' => true,
            'htmlOptions'=>array('style'=>'text-align: center'),
            'enablePagination' => true,
            'template'=>"{summary}{pager}<br>{items}{pager}",
            'columns' => array(
                array(
                    'name'=>'#ID',
                    'value'=>'$data->ref_no',
                    'htmlOptions'=>array('style'=>'text-align: center')
                ),
                array(
                    'name'=>'Title',
                    'value'=>'$data->title',
                    'htmlOptions'=>array('style'=>'text-align: left')
                ),
                array(
                    'name'=>'City',
                    'value'=>'$data->city',
                    'htmlOptions'=>array('style'=>'text-align: center')
                ),
                array(
                    'name'=>'State',
                    'value'=>'$data->state0->name',
                    'htmlOptions'=>array('style'=>'text-align: center')
                ),
                array(
                    'name'=>'Status',
                    'type'=>'raw',
                    'value'=>'$data->status == 1 ? "<a href=\'javascript:ChangeStatus(\"Sold\", $data->id)\' title=\'Click here to change Status\'><img src=" . Yii::app()->baseUrl . "/images/ok.png /></a>" : "<a href=\'javascript:ChangeStatus(\"Active\", $data->id)\' title=\'Click here to change Status\'><img src=" . Yii::app()->baseUrl . "/images/sold.png /></a>"',
                    'htmlOptions'=>array('style'=>'text-align: center')
                ),
                array(
                    'name'=>'Type',
                    'type'=>'raw',
                    'value'=>'$data->for_sale == 1 ? "<a href=\'javascript:ChangeType(\"For Rent\", $data->id)\' title=\'Click here to change Type\'><img src=" . Yii::app()->baseUrl . "/images/sale.png /></a>" : "<a href=\'javascript:ChangeType(\"For Sale\", $data->id)\' title=\'Click here to change Type\'><img src=" . Yii::app()->baseUrl . "/images/rent.png /></a>"',
                    'htmlOptions'=>array('style'=>'text-align: center')
                ),
                array(
                    'name'=>'View',
                    'type'=>'raw',
                    'value'=>'"<a href=\'" . Yii::app()->baseUrl . "/property/id/$data->id\' target=\'_blank\'><img src=\'" . Yii::app()->baseUrl . "/images/view.png\'/></a>"',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center')
                ),
                array(
                    'name'=>'Edit',
                    'type'=>'raw',
                    'value'=>'"<a href=\'admin/editpropery/$data->id\'><img src=\'" . Yii::app()->baseUrl . "/images/edit.png\'/></a>"',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center')
                ),
                array(
                    'name'=>'Delete',
                    'type'=>'raw',
                    'value'=>'"<a href=\'javascript:DeleteProperty($data->id)\' title=\'Click here to Delete this Property\'><img src=" . Yii::app()->baseUrl . "/images/delete.png /></a>"',
                    'htmlOptions'=>array('style'=>'text-align: center')
                ),
        )));
        ?>
    </div>    
    <?php $this->endWidget(); ?>
</div>