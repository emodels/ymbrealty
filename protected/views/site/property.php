<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<style type="text/css">
    #sidebar{ display: none; }
    #content{ padding-top: 0px; }
    .inner_layer{ display: none; }
</style>
<script type="text/javascript">
    var int_slide = 0;
    var image_total = <?php echo count($model->propertyImages); ?>;
    
    $(document).ready(function(){
        if (image_total == 0){
            $('#lnk_next').css('cursor', 'default').css('opacity', '0.3');
        }
        
        $('#lnk_next').click(function(){
            if (image_total != 0){
                if (int_slide != image_total){
                    int_slide++;
                    LoadImage(int_slide);
                }
            }
        });
        $('#lnk_back').click(function(){
            if (image_total != 0){
                if (int_slide != 1 && int_slide != 0){
                    int_slide--;
                    LoadImage(int_slide);
                }
            }
        });
    });

    function LoadImage(id){
        int_slide = id;
        
        if (int_slide == image_total){
            $('#lnk_next').css('cursor', 'default').css('opacity', '0.3');
        } else {
            $('#lnk_next').css('cursor', 'pointer').css('opacity', '1');;
        }

        if (int_slide == 1){
            $('#lnk_back').css('cursor', 'default').css('opacity', '0.3');
        } else {
            $('#lnk_back').css('cursor', 'pointer').css('opacity', '1');;
        }

        $('.slide_image').css('border','solid 2px black');
        $('#img_' + id).css('border','solid 2px red');
        $('#imgMain').attr('src', $('#img_' + id).attr('src'));
        $('#lnkMainImage').focus();
    }
</script>
<div class="column" style="background: white; padding: 20px 30px 10px 30px; width: 1114px; margin-left: -1px; border-top: solid 1px silver; margin: 0px; text-align: center">
    <a href="<?php echo Yii::app()->baseUrl; ?>/PropertyListing" style="font-size: 16px; color: black">Back to Property Listing</a>
    <div class="row" style="border: solid 4px #09f; border-bottom: none; border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 20px; margin-top: 20px">
        <div style="font-size: 27px; color: black"><b>#<?php echo $model->title; ?></b></div>
        <div style="font-size: 22px; color: black; padding-top: 10px">
            <?php echo $model->city; ?>, <?php echo $model->state0->name; ?> - $ 
            <?php echo Yii::app()->numberFormatter->format('0,000', $model->price); ?> USD
            <?php if ($model->mexican_peso_price > 0){ ?>
            / $ <?php echo Yii::app()->numberFormatter->format('0,000', $model->mexican_peso_price); ?> MXN
            <?php } ?>
        </div>
        <div class="row" style="display: inline-block; padding: 5px 10px 20px 10px">
            <div class="column" style="margin-right: 0px">
                <div class="row" style="padding-top: 200px">
                    <a href="javascript:return false;" id="lnk_back" style="opacity: 0.3; cursor: default"><img src="<?php echo Yii::app()->baseUrl; ?>/images/back_button.png" style="width: 150px"/></a>
                </div>
            </div>
            <div class="column" style="margin-right: 0px">
                <div class="row" style="padding-top: 20px">
                    <a  id="lnkMainImage" href="javascript:return false;" style="cursor: default"><img id="imgMain" src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_main; ?>" style="width: 720px; height: 480px; border: solid 1px black; border-radius: 30px"/></a>
                </div>
            </div>
            <div class="column" style="margin-right: 0px">
                <div class="row" style="padding-top: 200px">
                    <a href="javascript:return false;" id="lnk_next"><img src="<?php echo Yii::app()->baseUrl; ?>/images/next_button.png" style="width: 150px"/></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="padding: 10px 0 20px 0; text-align: center;">
            <div style="display:inline-block;">
                <div style="width: 760px; text-align: center">
                    <?php $count = 1; $row_count = 1; ?>    
                    <?php foreach ($model->propertyImages as $image) { ?>
                        <?php if($row_count == 1){ ?>
                        <div style="display: inline-block;">
                        <?php } ?>
                            <div id="slide_<?php echo $count; ?>" class="column" style="padding: 0px; margin: 5px; width: 141px"><a href="javascript:LoadImage('<?php echo $count; ?>');"><img id="img_<?php echo $count; ?>" class="slide_image" src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $image->file_name; ?>" style="width: 115px; height: 99px; border: solid 2px black; border-radius: 20px"/></a></div>
                        <?php if ($row_count == 5 || count($model->propertyImages) == $count) { $row_count = 0; ?>
                        </div>
                        <?php } ?>
                    <?php $count++; $row_count++; ?>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div style="padding: 20px 0 10px 0; font-size: 20px; color: black; text-align: justify"><?php echo $model->short_desc; ?></div>
        <div style="padding: 10px 0 20px 0; font-size: 20px; color: black; text-align: justify"><?php echo $model->full_desc; ?></div>
    </div>
</div>
<div class="column" style="background: white; padding: 20px 10px 20px 10px; width: 1154px; margin-left: -1px; margin: 0px; text-align: center; font-size: 22px; color: black">I can show you <b>any</b> property on <b>any</b> web site including  for <b>“sale by owners”</b> and properties  <b>“represented as  exclusive”</b> by other realtors.</div>
<div class="column" style="background: white; padding: 20px 10px 20px 10px; width: 1154px; margin-left: -1px; margin: 0px; text-align: center;"><a href="<?php echo Yii::app()->baseUrl; ?>/contact"><img src="<?php echo Yii::app()->baseUrl; ?>/images/contact_us_property.png" class="opacity_effect"/></a></div>
<div class="clearfix"></div>