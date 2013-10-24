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
            'value'=>'"<a href=\'" . Yii::app()->baseUrl . "/admin/editpropery/$data->id\'><img src=\'" . Yii::app()->baseUrl . "/images/edit.png\'/></a>"',
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
