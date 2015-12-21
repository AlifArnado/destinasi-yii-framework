<?php
/* @var $this KotaController */
/* @var $model Kota */

$this->breadcrumbs=array(
    'Kotas'=>array('index'),
    'Manage',
);

$idProp = $_GET['propinsi_id'];

$this->menu=array(
    array('label'=>'List Kota', 'url'=>array('index')),
    array('label'=>'Create Kota', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#kota-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>Manajemen Data Kota</h1>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
    $prop=Provinsi::model()->findByPk($idProp);
    $this->renderPartial('_propinsi', array('prop'=>$prop,));
 ?>

<div class="row-buttons-2" align="right">
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/cari.png'),'#', array('class'=>'search-button','title'=>'Pencarian Data')); ?>
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/petunjuk.png'),'#', array('title'=>'Petunjuk','onclick'=>"$('#helpdialog').dialog('open')",)); ?>
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/tambah.png'), array('create','propinsi_id'=>$idProp), array('title'=>'Menambah Data')); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'kota-grid',
    'dataProvider'=>$model->searchKota($idProp),
    'filter'=>$model,
    'columns'=> array(
        array( // buat nomor urut
        'header'=>'NO',
        'value'=>'$this->grid->dataProvider->pagination->currentPage*
            $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        'htmlOptions'=>array('width'=>'3%',
            'style'=>'text-align:center'),
        ),
        array(
                'name'=>'nama_kota',
                'type'=>'raw',
                'value'=>'CHtml::encode($data->nama_kota)',
                'htmlOptions'=>array('width'=>''),
            ),
    // 'columns'=>array(
    //     'id',
    //     'propinsi_id',
    //     'nama_kota',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
