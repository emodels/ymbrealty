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
            'enablePagination' => true,
            'template'=>"{summary}{pager}<br>{items}{pager}",
            'columns' => array(
                array(
                    'name'=>'#ID',
                    'value'=>'$data->ref_no'
                ),
                array(
                    'name'=>'Title',
                    'value'=>'$data->title'
                ),
                array(
                    'name'=>'City',
                    'value'=>'$data->city'
                ),
                array(
                    'name'=>'State',
                    'value'=>'$data->state0->name'
                ),
                array(
                    'name'=>'View',
                    'type'=>'raw',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center'),
                    'value'=>'CHtml::link("View", $data->id, array("target"=>"_blank"))'
                ),
            )));
        ?>
    </div>    
    <?php $this->endWidget(); ?>
</div>