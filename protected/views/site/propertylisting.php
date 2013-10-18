<?php Yii::app()->clientScript->registerMetaTag('Yucatan real estate Mexico, realtor Yucatan Mexico, Yucatan real estate for sale, beach house in Progreso, beach house in Yucatan, Mexico Yucatan real estate, Mexico gulf coast real estate, Yucatan real estate listings, Yucatan real estate agents, Mayan Living real estate', 'keywords', null, array('id'=>'meta_keywords')); ?>
<style type="text/css">
    #sidebar{ display: none; }
    #content{ padding-top: 0px; }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        UpdatePriceRange();
    });
    
    function UpdatePriceRange(){
        var min_price = $('.price_tag:first').text();
        var max_price = $('.price_tag:last').text();
        
        $('.summary').html('<b>Displaying Price Range : ' + min_price + ' - ' + max_price + '</b>');
    }
</script>
<div class="column" style="background: white; padding: 10px 20px 10px 20px; width: 1134px; margin-left: -1px; border-top: solid 1px silver; margin: 0px">
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_property_list',
    'template'=>"{summary}{pager}<br>{items}{pager}",
    'sortableAttributes'=>array(
        'id',
        'price'
    ),
    'afterAjaxUpdate'=>'UpdatePriceRange'
));
?>
</div>
<div class="column" style="background: white; padding: 20px 10px 20px 10px; width: 1154px; margin-left: -1px; margin: 0px; text-align: center; font-size: 22px; color: black">I can show you <b>any</b> property on <b>any</b> web site including  for <b>“sale by owners”</b> and properties  <b>“represented as  exclusive”</b> by other realtors.</div>
<div class="clearfix"></div>