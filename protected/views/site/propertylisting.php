<style type="text/css">
    #sidebar{ display: none; }
    #content{ padding-top: 0px; }
</style>
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
));
?>
</div>
<div class="column" style="background: white; padding: 20px 10px 20px 10px; width: 1154px; margin-left: -1px; margin: 0px; text-align: center; font-size: 22px; color: black">I can show you <b>any</b> property on any web site including  for <b>“sale by owners”</b> and properties  <b>“represented as  exclusive”</b> by other realtors.</div>
<div class="clearfix"></div>