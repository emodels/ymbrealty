<div class="row <?php echo $index%2 ? 'listview_row_main' : 'listview_row_alternative' ?>">
    <div class="column" style="width: 210px">
        <div style="padding: 5px 0 5px 0; font-size: 20px;"><b>Property ID : </b><?php echo $data->ref_no; ?></div>
        <div><a href="property/id/<?php echo $data->id; ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/property_images/<?php echo $data->image_main; ?>" style="width: 200px; height: 150px; border-radius: 10px; border: solid 1px gray" class="opacity_effect"/></a></div>
    </div>
    <div class="column" style="width: 880px; padding-top: 5px">
        <div style="font-size: 22px; text-align: center; color: black; padding-bottom: 20px"><a href="property/id/<?php echo $data->id; ?>"><b><?php echo $data->title; ?></b></a></div>
        <div style="padding: 10px 0 10px 0; font-size: 18px; border-bottom: dotted 1px gray; text-align: left">
            <div class="column" style="width: 70px"><b>City :</b></div>
            <div class="column" style="width: 170px"><?php echo $data->city; ?></div>
            <div class="column" style="width: 80px"><b>State :</b></div>
            <div class="column" style="width: 170px"><?php echo $data->state0->name; ?></div>
            <div class="column" style="width: 80px"><b>Price :</b></div>
            <div class="column" style="width: 200px">$ <?php echo Yii::app()->numberFormatter->format('0,000', $data->price); ?> USD</div>
            <div class="clearfix"></div>
        </div>
        <div style="font-size: 15px; text-align: justify; padding-top: 20px"><?php echo $data->short_desc; ?></div>
    </div>    
    <div class="clearfix"></div>
    <div style="position: absolute; right: 0px; top: 0px; font-size: 15px; padding: 10px; width: 100px; background: #3C89D1; color: white; text-align: center; border-bottom-left-radius: 5px"><?php echo $data->propertyCategories[0]->category0->name; ?></div>
    <?php if ($data->status == 0){ ?>
    <div style="position: absolute; right: 0px; top: 50px; font-size: 15px; padding: 10px; width: 100px; background: red; color: white; text-align: center; border-bottom-left-radius: 5px; border-top-left-radius: 5px">SOLD</div>
    <?php } ?>
</div>