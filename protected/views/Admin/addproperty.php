<script type="text/javascript">
$(document).ready(function(){
    $(".lnk_remove").die().live('click', function() {
        var str_array = $('#image_others').val();
        str_array = str_array.replace($(this).parent().attr('id') + ',', '');
        str_array = str_array.replace($(this).parent().attr('id'), '');
        $('#image_others').val(str_array);
        $(this).parent().remove();
    });
    
    $('input[type=checkbox]').click(function(){
        if ($('input:checked').length > 0){
            $('.checkboxgroup').removeClass('error');
            $('#category_em_').css('display','none');
        } else {
            $('.checkboxgroup').addClass('error');
            $('#category_em_').css('display','block');
        }
    });
});

function UpdateOtherImages(filename){
    var str_array = $('#image_others').val();
    if(str_array == ''){
       str_array = filename; 
    } else {
       str_array = str_array + ',' + filename; 
    }
    $('#image_others').val(str_array);
    $('#upload_other_image .qq-upload-list').remove();
    
    d = new Date();
    var str_image = '<div id="' + filename + '" class="column" style="text-align: center"><img src="<?php echo Yii::app()->baseUrl; ?>/property_images/' + filename + '?' + d.getTime() + '" class="upload_image" /><br/><a class="lnk_remove" href="javascript:return false;">Delete</a></div>';
    $('#div_img_other').html($('#div_img_other').html() + str_image);
}

function formSend(form, data, hasError){
    $('.checkboxgroup').removeClass('error');
    $('#img_main').parent().removeClass('error'); 
    $('#category_em_').css('display','none');
    $('#main_image_em_').css('display','none');
    
    if($('input:checked').length==0){
       $('.checkboxgroup').addClass('error');
       $('#category_em_').css('display','block');
       hasError = true;
    }
    
    if($('#Property_image_main').val()==''){
       $('#img_main').parent().addClass('error'); 
       $('#main_image_em_').css('display','block');
       hasError = true;
    }
    
    if (!hasError){
        return true;
    } else {
        $(window).scrollTop($('.column .error :first').offset().top);
        return false;
    }
}
</script>
<style type="text/css">
#menu_add_new_property{
background-image: -ms-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: -moz-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: -o-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #559ABD), color-stop(1, #002A3D));
background-image: -webkit-linear-gradient(top, #559ABD 0%, #002A3D 100%);
background-image: linear-gradient(to bottom, #559ABD 0%, #002A3D 100%);
}
    
.upload_image{
    width: 150px;
    height: 150px;
    margin: 5px;
    border: solid 1px gray;
}

.checkboxgroup{
    border: solid 1px silver;
    padding: 20px;
}
.checkboxgroup div{
   float:left;
   padding-right: 25px;
}

.checkboxgroup label{
   float:left;
}

.checkboxgroup span{
   float:left;
   padding-right: 10px;
}
</style>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate'=>'js:formSend'
        ),
    ));
    ?>
    <h1 style="font-size: 22px; padding: 10px"><b>Add Property</b></h1>
    <?php echo $form->hiddenField($model, 'ref_no'); ?>
    <?php echo $form->hiddenField($model, 'image_main'); ?>
    <?php echo CHtml::hiddenField('image_others'); ?>
    <div class="row" style="position: relative; padding: 20px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px">
        <div class="row">
            <div class="column" style="width: 200px"><b>Property #ID</b></div>
            <div class="column" style="color: blue"><strong><?php echo $model->ref_no; ?></strong></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Title</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'title', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'title', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
         <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Address</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'address', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'address', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>City</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'city', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'city', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>State</b></div>
            <div class="column">
                <?php echo $form->dropDownList($model, 'state', CHtml::listData(State::model()->findAll(), 'id', 'name'), array('empty'=>'Select', 'style'=>'width: 305px')); ?>
                <?php echo $form->error($model, 'state', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Property Type</b></div>
            <div class="column">
                <?php echo $form->dropDownList($model, 'for_sale', array('0'=>'For Rental', '1'=>'For Sale'), array('empty'=>'Select', 'style'=>'width: 305px')); ?>
                <?php echo $form->error($model, 'for_sale', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
       <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Summary</b></div>
            <div class="column">
                <?php echo $form->textArea($model, 'short_desc', array('rows'=>4, 'style'=>'width: 500px')); ?>
                <?php echo $form->error($model, 'short_desc', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Description</b></div>
            <div class="column">
                <?php echo $form->textArea($model, 'full_desc', array('rows'=>4, 'style'=>'width: 500px')); ?>
                <?php echo $form->error($model, 'full_desc', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 20px">
            <div class="column" style="width: 200px"><b>Category</b></div>
            <div class="column checkboxgroup">
                <?php echo CHtml::checkBoxList('category', '', CHtml::listData(Category::model()->findAll(), 'id', 'name'), array('separator'=>'', 'template'=>'<div><span>{input}</span><span>{label}</span></div>')); ?>
            </div>
            <div class="clearfix"></div>
            <div style="width: auto; padding-left: 210px; display: none" class="errorMessage" id="category_em_">Please select at least one Category</div>        
        </div>
        <div class="row" style="padding-top: 20px">
            <div class="column" style="width: 200px"><b>Number of Bed Rooms</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'bed_rooms', array('style'=>'width: 100px')); ?>
                <?php echo $form->error($model, 'bed_rooms', array('style'=>'width: auto')); ?>
            </div>
            <div class="column" style="width: 200px; padding-left: 78px"><b>Number of Bath Rooms</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'bath_rooms', array('style'=>'width: 100px')); ?>
                <?php echo $form->error($model, 'bath_rooms', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 20px">
            <div class="column" style="width: 200px"><b>Price in USD <br/><font style='font-size: 10px'>(<i>Without Symbols</i>)</font></b></div>
            <div class="column">
                <?php echo $form->textField($model, 'price', array('style'=>'width: 100px')); ?>
                <?php echo $form->error($model, 'price', array('style'=>'width: auto')); ?>
            </div>
            <div class="column" style="width: 200px; padding-left: 78px"><b>Price in Mexican peso <br/><font style='font-size: 10px'>(<i>Without Symbols</i>)</font></b></div>
            <div class="column">
                <?php echo $form->textField($model, 'mexican_peso_price', array('style'=>'width: 100px')); ?>
                <?php echo $form->error($model, 'mexican_peso_price', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Keywords <br/><font style='font-size: 10px'>(<i>Please separate keywords with a comma, but no spaces</i>)</font></b></div>
            <div class="column"><?php echo $form->textArea($model, 'keywords', array('rows'=>4, 'style'=>'width: 500px')); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Main Photo<br/><font style='font-size: 10px'>(<i>File size must be less than 1 MB and file type must be either JPG, JPEG or GIF</i>)</font></b></div>
            <div class="column">
                <img id="img_main" class="upload_image" style="margin: 0px; display: none" /><br/>
                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                    'id'=>'upload_main_image',
                    'config'=>array(
                        'action'=>Yii::app()->createUrl('admin/upload',array('id'=>$model->ref_no)),
                        'allowedExtensions'=>array("jpg","jpeg","gif"),
                        'sizeLimit'=>2*1024*1024,
                        'onComplete'=>"js:function(id, fileName, responseJSON){ $('#Property_image_main').val(responseJSON['filename']); d = new Date(); $('#img_main').attr('src','" . Yii::app()->baseUrl . "/property_images/' + responseJSON['filename'] + '?' + d.getTime()).css('display','block'); $('#upload_main_image .qq-upload-list').remove(); $('#main_image_em_').css('display','none'); $('#img_main').parent().removeClass('error'); }",
                        )
                )); ?></div>
            <div class="clearfix"></div>
            <div style="width: auto; padding-left: 210px; display: none" class="errorMessage" id="main_image_em_">Please Upload Main Image</div>        
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Additional Photos</b></div>
            <div class="column">
                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                    'id'=>'upload_other_image',
                    'config'=>array(
                        'action'=>Yii::app()->createUrl('admin/upload',array('id'=>$model->ref_no)),
                        'allowedExtensions'=>array("jpg","jpeg","gif"),
                        'sizeLimit'=>2*1024*1024,
                        'onComplete'=>"js:function(id, fileName, responseJSON){ UpdateOtherImages(responseJSON['filename']); }",
                        )
                )); ?></div>
            <div class="column">
                <div id="div_img_other"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 20px; font-size: 20px; border-bottom: solid 2px gray"><b>Property owner info</b></div>
        <div class="row" style="padding-top: 25px">
            <div class="column" style="width: 200px"><b>Property address</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'property_address', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'property_address', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>CFE meter #</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'cfe_meter', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'cfe_meter', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>List date</b></div>
            <div class="column">
                <?php 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'attribute'=>'list_date',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'dd-mm-yy',
                        'changeMonth' => 'true',
                        'changeYear' => 'true',
                        'constrainInput' => 'false',
                        'yearRange' => 'c-15:c+15'
                    ),
                    'htmlOptions'=>array(
                        'style'=>'width: 300px',
                        'readonly'=>'readonly'
                    ),
                ));                        
                ?>                
                <?php echo $form->error($model, 'list_date', array('style'=>'width: auto')); ?>
            </div>
            <div class="column" style="width: 150px; padding-left: 78px"><b>Price</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_price', array('style'=>'width: 200px')); ?>
                <?php echo $form->error($model, 'vendor_price', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Vendor name</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_name', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'vendor_name', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Vendor address</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_address', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'vendor_address', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Contact # Home</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_contact_home', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'vendor_contact_home', array('style'=>'width: auto')); ?>
            </div>
            <div class="column" style="width: 150px; padding-left: 78px"><b>Cell</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_contact_cell', array('style'=>'width: 200px')); ?>
                <?php echo $form->error($model, 'vendor_contact_cell', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Email</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_email', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'vendor_email', array('style'=>'width: auto')); ?>
            </div>
            <div class="column" style="width: 150px; padding-left: 78px"><b>Skype</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_skype', array('style'=>'width: 200px')); ?>
                <?php echo $form->error($model, 'vendor_skype', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>State / Province</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_state_province', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'vendor_state_province', array('style'=>'width: auto')); ?>
            </div>
            <div class="column" style="width: 150px; padding-left: 78px"><b>Post code / Zip</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_postcode_zip', array('style'=>'width: 200px')); ?>
                <?php echo $form->error($model, 'vendor_postcode_zip', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px"><b>Country</b></div>
            <div class="column">
                <?php echo $form->textField($model, 'vendor_country', array('style'=>'width: 300px')); ?>
                <?php echo $form->error($model, 'vendor_country', array('style'=>'width: auto')); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="column" style="width: 200px">&nbsp;</div>
            <div class="column"><input type="submit" value="Add Property" class="button_orange" style="padding: 10px; font-size: 20px; cursor: pointer"/></div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>    
