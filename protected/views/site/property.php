<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<style type="text/css">
    #sidebar{ display: none; }
    #content{ padding-top: 0px; }
</style>
<script type="text/javascript">
function LoadImage(strUrl){
    $('#imgMain').attr('src', strUrl);
}
</script>
<div class="column" style="background: white; padding: 20px 10px 10px 10px; width: 1154px; margin-left: -1px; border-top: solid 1px silver; margin: 0px; text-align: center">
    <a href="<?php echo Yii::app()->baseUrl; ?>/PropertyListing" style="font-size: 16px">Back to Property Listing</a>
    <div class="row" style="border: solid 2px #09f; border-radius: 10px; padding: 20px; margin-top: 20px">
        <div style="font-size: 27px; color: black"><b>#<?php echo $model->title; ?></b></div>
        <div style="font-size: 22px; color: black; padding-top: 10px"><?php echo $model->city; ?>, <?php echo $model->state0->name; ?> - $ <?php echo $model->price; ?> USD</div>
        <div class="row" style="display: inline-block; padding: 20px 50px 20px 100px">
            <div class="column">
                <div class="row">
                    <a href="javascript:LoadImage('<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_top_left; ?>');"><img src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_top_left; ?>" style="width: 80px; border: solid 1px black"/></a>
                </div>
                <div class="row" style="padding-top: 135px">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->floor_plan; ?>" target="_blank"><img src="<?php echo Yii::app()->baseUrl; ?>/images/floorplan.gif" style="width: 80px"/></a>
                </div>    
                <div class="row" style="padding-top: 128px">
                    <a href="javascript:LoadImage('<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_bottom_left; ?>');"><img src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_bottom_left; ?>" style="width: 80px; border: solid 1px black"/></a>
                </div>    
            </div>
            <div class="column">
                <div class="row" style="padding-top: 60px">
                    <img id="imgMain" src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_main; ?>" style="max-width: 590px; border: solid 1px black"/>
                </div>
            </div>
            <div class="column">
                <div class="row">
                    <a href="javascript:LoadImage('<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_top_right; ?>');"><img src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_top_right; ?>" style="width: 80px; border: solid 1px black"/></a>
                </div>
                <div class="row" style="padding-top: 135px">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->site_plan; ?>" target="_blank"><img src="<?php echo Yii::app()->baseUrl; ?>/images/siteplan.gif" style="width: 80px"/></a>
                </div>    
                <div class="row" style="padding-top: 128px">
                    <a href="javascript:LoadImage('<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_bottom_right; ?>');"><img src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $model->image_bottom_right; ?>" style="width: 80px; border: solid 1px black"/></a>
                </div>    
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="column" style="background: white; padding: 20px 10px 20px 10px; width: 1154px; margin-left: -1px; border-top: solid 1px silver; margin: 0px; text-align: center; font-size: 22px; color: black">I can show you <b>any</b> property on any web site including  for <b>“sale by owners”</b> and properties  <b>“represented as  exclusive”</b> by other realtors.</div>
<div class="clearfix"></div>