<?php Yii::app()->clientScript->registerMetaTag('Yucatan real estate Mexico, realtor Yucatan Mexico, Yucatan real estate for sale, beach house in Progreso, beach house in Yucatan, Mexico Yucatan real estate, Mexico gulf coast real estate, Yucatan real estate listings, Yucatan real estate agents, Mayan Living real estate', 'keywords', null, array('id'=>'meta_keywords')); ?>
<script type="text/javascript">
    $('#btn_search').live('click', function(){
         if ($('#txt_prop_id').val() == '' && $('#txt_prop_price').val() == ''){
            alert('Please enter Property ID or Price');
         }
        
         if ($('#txt_prop_id').val() != ''){
            $.ajax({
                type: "GET",
                url: "site/CheckProperty?mode=id&value=" + $('#txt_prop_id').val(),
                success: function(data){
                    if(data != ''){
                        window.document.location.href = 'property/id/' + data;
                    }else{
                        alert('Invalid Property ID');
                    }
                }
            });     
         } else {
            if ($('#txt_prop_price').val() != ''){
                if (isNaN($('#txt_prop_price').val())){
                    alert('Property Price must be numeric');
                } else {
                    window.document.location.href = 'PropertyListing?price_range=' + $('#txt_prop_price').val();
                }
            }   
        }
    });
</script>
<style type="text/css">
    #sidebar .orange_line { height: 413px; }
</style>
<div class="row">
    <div class="column" style="width: 100%; color: black; font-size: 16px; font-weight: bolder; text-align: center">I can show you any Merida and Yucatan beach or beachfront property, <br/> including "for sale by owner" and properties "represented as exclusive" by other realtors</div>
    <div class="column" style="width: 100%; text-align: center; padding-top: 20px">
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_featured_property',
            'template'=>"{items}",
        ));
        ?>
    </div>
    <div class="column" style="width: 100%; text-align: center; padding-top: 20px; padding-left: 10px; font-size: 16px; font-weight: bold; color: black">
        If you know the property number OR price range you are interested in then<br/> enter it here # <input type="text" id="txt_prop_id" style="width: 50px"/>  $  <input type="text" id="txt_prop_price" style="width: 50px"/> <input id="btn_search" type="button" class="button_orange" value="Search" style="cursor: pointer"/> otherwise
    </div>
    <div class="column" style="width: 100%; text-align: center; padding-top: 0px; padding-left: 10px">
        <a href="propertylisting" style="display: inline-block; text-decoration: none; font-size: 22px; color: black; font-weight: bold; text-align: center"><div class="gradient_gray_box" style="width: 882px; padding: 15px 0 15px 0; border-radius: 20px">Click here to see all our properties in ascending  order of price</div></a>
    </div>
    <div class="column" style="width: 1164px; background: #A4DEEA; margin-top: 11px; border-bottom: solid 2px silver; border-right: solid 1px silver; height: 20px"></div>
    <div class="column" style="padding: 12px 5px 5px 10px"><img src="images/banner_1.jpg" /></div>
    <div class="column" style="text-align: center; width: 1164px; padding: 15px 10px 15px 10px; font-weight: bold; font-size: 21px; color: red;">"RETIRE TO MEXICO - SUPERCHARGE YOUR DOLLAR - BECOME A MIDDLE CLASS MILLIONAIRE"</div>
    
    <div class="column" style="width: 1164px; margin: 5px 0 5px 10px">
        <div class="row">
            <div class="column"><img src="images/rob_group.jpg" /></div>
            <div class="column" style="margin-right: 0px"><img src="images/RetireToMexico.jpg" /></div>
            <div class="column"><a href="http://www.amazon.com/Retire-Mexico-Supercharge-Middle-class-Millionaire/dp/061540815X/ref=sr_1_1?ie=UTF8&s=books&qid=1293319286&sr=1-1"><img src="images/amazon.jpg" /></a></div>
            <div class="column"><img src="images/rob_talk.jpg" /></div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="column" style="width: 1165px; text-align: left; background: white; margin-left: -1px; margin-top: 5px; padding-bottom: 15px; padding-left: 10px">
        <div style="padding: 5px 0 15px 0; font-size: 24px; color: red; font-weight: bolder; text-align: center">Best selling author and realtor Robert Harker shares secrets to a far better life in Yucatan, Mexico !!</div>
        <div style="text-align: center; width: 100%; display: inline-block; padding-left: 5px; color: black">
            <div class="row">
                <div class="column" style="width: 50px; text-align: left"><img src="images/arrow.png"/></div>
                <div class="column" style="padding-top: 7px; width: 460px; text-align: left">Living like a king on $ 20k a year including health insurance</div>
                <div class="column" style="width: 50px; text-align: left"><img src="images/arrow.png"/></div>
                <div class="column" style="padding-top: 7px; width: 550px; text-align: left">Navigating the “trap doors of Mexican commerce” to find your international gold</div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="column" style="width: 50px; text-align: left"><img src="images/arrow.png"/></div>
                <div class="column" style="padding-top: 7px; width: 460px; text-align: left">20 things you need to do “BEFORE YOU LEAVE” your country origin to avoid the big problems later.</div>
                <div class="column" style="width: 50px; text-align: left"><img src="images/arrow.png"/></div>
                <div class="column" style="padding-top: 7px; width: 550px; text-align: left">The “A to Z“ on formulas, what to avoid, how to minimize risk and maximize profits, all from industry insiders !!!</div>
                <div class="clearfix"></div>
            </div>
        </div>    
        <div style="width: 1155px; padding: 15px 0 10px 0; font-size: 24px; color: red; font-weight: bolder; text-align: center; border-bottom: dotted 2px silver">OVER 400 PAGES OF CRITICAL INFORMATION</div>        
    </div>
    <div class="column" style="width: 1165px; background: white; margin-left: -1px; padding-left: 10px">
        <div style="text-align: center; width: 1143px">
            <div style="padding: 5px 0 15px 0; font-size: 21px; color: navy; font-weight: bolder; text-align: center">Your accommodations are free when you buy  through YMB Realty</div>
            <div><img src="images/main_house.png" /></div>
            <div style="padding: 10px 0 10px 0"><a href="contact"><img src="images/book_now_button.png" class="opacity_effect" /></a></div>
            <div class="row" style="text-align: center; display: inline-block; padding: 0 0 15px 0">
                <div class="column" style="margin-right: 17px"><img src="images/house_image_1.png" style="border: solid 1px gray; border-radius: 5px"/></div>
                <div class="column" style="margin-right: 17px"><img src="images/house_image_2.png" style="border: solid 1px gray; border-radius: 5px"/></div>
                <div class="column" style="margin-right: 0px"><img src="images/house_image_3.png" style="border: solid 1px gray; border-radius: 5px"/></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>