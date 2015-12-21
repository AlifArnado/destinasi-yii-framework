<?php
/* @var $this ProvinsiController */
/* @var $model Provinsi */

$this->breadcrumbs=array(
    'Provinsi'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List Provinsi', 'url'=>array('index')),
    array('label'=>'Create Provinsi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#provinsi-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id'=>'helpdialog',
            'options'=>array(
                    'title'=>'Petunjuk',
                    'autoOpen'=>false,
                    'modal'=>true,
                    'show'=>'slide',
                    'hide'=>'slide',
                ),
        ));
    echo $this->renderPartial('_help');
    $this->endWidget();

 ?>

<h1>Pemeliharaan Tabel Provinsi</h1>

<div class="row-buttons-2">
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/cari.png'),'#', array('class'=>'search-button','title'=>'Pencarian Data')); ?>
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/petunjuk.png'),'#', array('title'=>'Petunjuk','onclick'=>"$('#helpdialog').dialog('open')",)); ?>
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl. '/images/tambah.png'), array('create'), array('title'=>'Menambah Data')); ?>
</div>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php //echo CHtml::link('Cari','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php //echo CHtml::link('Tambah Provinsi', array('propinsi/create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'provinsi-grid',
    'dataProvider'=>$model->search(),
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
            'name'=>'propinsi',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->propinsi),
                $data->kotaUrl)',
                'htmlOptions'=>array('width'=>'50%'),
        ),
    ),
)); ?>
