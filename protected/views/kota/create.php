<?php
/* @var $this KotaController */
/* @var $model Kota */

$this->breadcrumbs=array(
	'Kotas'=>array('index'),
	'Create',
);

$idProp = $_GET['propinsi_id'];

$this->menu=array(
	array('label'=>'List Kota', 'url'=>array('index')),
	array('label'=>'Manage Kota', 'url'=>array('admin')),
);
?>

<h1>Create Kota</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'propinsi_id'=>$idProp)); ?>
