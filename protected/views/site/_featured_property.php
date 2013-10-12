<a href="property/id/<?php echo $data->id; ?>" style="text-decoration: none; display: inline-block">
    <div class="row box" style="width: 116px; margin: 0 22px 0 22px; border-radius: 20px">
        <div><img src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $data->image_main; ?>" style="width: 100%; height: 90px; border-top-left-radius: 20px; border-top-right-radius: 20px;"/></div>
        <div style="background: #3C89D1; text-align: center; font-size: 11px; color: white; padding: 3px 0 3px 0"><?php echo $data->propertyCategories[0]->category0->name; ?></div>
        <div style="color: black; font-size: 11px; text-align: center; padding: 5px; height: 22px; overflow: hidden"><?php echo $data->title; ?></div>
        <div style="color: black; font-size: 11px; font-weight: bold; text-align: center; padding-top: 5px">$ <?php echo $data->price; ?> USD</div>
        <div style="text-align: center"><input type="button" class="button_orange" value="Details"/></div>
    </div>
</a>    
