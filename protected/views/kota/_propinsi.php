<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$prop,
    'attributes'=>array(
            array('label' => 'ID', 'value'=> $prop->id, ),
            array('label' => 'Provinsi', 'value'=> $prop->propinsi, )
    ),
)); ?>
