<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\yadmin\modules\process\models\UpDownTimeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// echo "<pre>";print_r($dataProvider);die;
$this->title = 'Power Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="up-down-time-index">
    <div class='row'>
        <div class='col-sm-12'>
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Power Logs List</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                        <?php
                        // if (Yii::$app->user->can('/yadmin/process/updowntime/upload')) {
                        //     echo Html::a('<i class="fa fa-upload"></i> Up & Down Time Bulk Upload', ["upload"], ['class' => 'btn btn-warning btn-xs']);
                        // }
                        ?>  
                        <?php
                        // if (Yii::$app->user->can('/yadmin/process/updowntime/create')) {
                        //     echo Html::a('<i class="fa fa-plus-circle"></i> Add Uptime and Downtime', ["create"], ['class' => 'btn btn-primary btn-xs']);
                        // }
                        ?>
                    </div>                        
                </div>
            </div>
            <div class="box box-info">
                <div class='box-body box-no-padding'>
                    <?php
                    Pjax::begin([
                        'id' => 'grid-data',
                        'enablePushState' => FALSE,
                        'enableReplaceState' => FALSE,
                    ]);
                    ?>
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?php
                    // $gridColumns = [
                        // [
                        //     'label' => 'School Name',
                        //     'filter' => false,
                        //     'value' => function ($model) {
                        //         return $model->school->school_name;
                        //     },
                        //     'format' => 'raw',
                        //     'contentOptions' => ['style' => 'width: 700px;']
                        // ],
                        // [
                        //     'label' => 'District',
                        //     'filter' => false,
                        //     'value' => function ($model) {
                        //         return $model->school->district;
                        //     },
                        //     'format' => 'raw',
                        // ],
                        // [
                        //     'label' => 'Block',
                        //     'filter' => false,
                        //     'value' => function ($model) {
                        //         return $model->school->block;
                        //     },
                        //     'format' => 'raw',
                        // ],
                    //     [
                    //         'label' => 'Device',
                    //         'filter' => false,
                    //         'value' => function ($model) {
                    //             return ucfirst($model->server_name);
                    //         },
                    //     ],
                    //     [
                    //         'label' => 'Status',
                    //         'filter' => false,
                    //         'value' => function ($model) {
                    //             return $model->issue_type;
                    //         },
                    //         'format' => 'raw',
                    //     ],
                        // [
                        //     'label' => 'Date',
                        //     'filter' => false,
                        //     'value' => function ($model) {
                        //         return $model->date != null ? Yii::$app->formatter->asDatetime($model->date, "php:d-m-Y") : 'Not Available';
                        //     },
                        // ]
                    //     [
                    //         'label' => 'Start Time',
                    //         'filter' => false,
                    //         'value' => function ($model) {
                    //             return $model->start_time != null ? Yii::$app->formatter->asDatetime($model->start_time, "php:h:i:s A") : 'Not Available';
                    //         },
                    //     ],
                    //     [
                    //         'label' => 'End Time',
                    //         'filter' => false,
                    //         'value' => function ($model) {
                    //             return $model->end_time != null ? Yii::$app->formatter->asDatetime($model->end_time, "php:h:i:s A") : 'Not Available';
                    //         },
                    //     ],
                    //     [
                    //         'label' => 'Duration',
                    //         'filter' => false,
                    //         'value' => function ($model) {
                    //             return $model->duration;
                    //         },
                    //         'format' => 'raw',
                    //     ],
                    //     [
                    //         'label' => 'Description',
                    //         'filter' => false,
                    //         'value' => function ($model) {
                    //             return $model->issue_description != null ? $model->issue_description : '-NA-';
                    //         },
                    //         'format' => 'raw',
                    //     ],
                    // ];
                    ?>

                    <div class='box-body box-no-padding'>  
                       <div class='row'> 
                            <div class='col-xs-12'>   
                                <div class="pull-right">
                                    <?php
                                    echo ExportMenu::widget([
                                        'dataProvider' => $dataProvider,
//                                        'columns' => $gridColumns,
//                                            'asDropdown' => false,
                                        'target' => ExportMenu::TARGET_BLANK,
                                        'exportConfig' => [
                                            ExportMenu::FORMAT_TEXT => false,
                                            ExportMenu::FORMAT_HTML => false,
                                            ExportMenu::FORMAT_EXCEL => true,
                                            ExportMenu::FORMAT_PDF => true,
                                            ExportMenu::FORMAT_EXCEL_X => false,
                                        ],
                                        'dropdownOptions' => [
                                            'label' => 'Export',
                                            'class' => 'btn btn-warning'
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>

			<?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'pjax' => true,
                            'pjaxSettings' => [
                                'options' => [
                                    'enablePushState' => false,
                                ]
                            ],
                            'responsive' => true,
                            'hover' => true,
                            //'layout' => '{items}{summary}{pager}',
                            'tableOptions' => ['class' => 'table table-striped table-hover table-condensed'],
                            'emptyText' => "<div class='panel'>
                                    <table class='table'>
                                        <div class='col-sm-12 text-center'>
                                            <img src='/images/nodata.jpg' alt='Main Title Here'>
                                        </div>            
                                    </table>
                                </div>",
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 50px;']],
                                [
                                    'class' => 'kartik\grid\ExpandRowColumn',
                                    'header' => '',
                                    'expandAllTitle' => 'Expand all',
                                    'collapseTitle' => 'Collapse all',
                                    'expandIcon' => '<span class="glyphicon glyphicon-expand"></span>',
                                    'value' => function ($model, $key, $index, $column) {
                                        return GridView::ROW_COLLAPSED;
                                    },
                                   'detail' => function ($models) {
                                       return Yii::$app->controller->renderPartial('_power_logs.php', ['power_logs'=>$models['power_logs']]);
                                    },
                                    'detailOptions' => [
                                        'class' => 'kv-state-enable',
                                    ],
                                    'contentOptions' => ['style' => 'width: 50px;']
                                ],
				[
                                  'header' => 'School Name',
                                  'attribute' => 'school_id',
                                  'filter' => false,
                                  'visible' => (Yii::$app->user->identity->role != 'ict_instructor' && Yii::$app->user->identity->role != 'HM'),
                                  'value' => function ($models) {
                                 	 return app\modules\yadmin\modules\process\helpers\SchoolHelper::Schooldetails($models['school_id']);
                                  },
                                  'format' => 'html',
                                  'contentOptions' => ['style' => 'width: 400px;']
                                ],
                                [
                                  'header' => 'Asst Type',
                                  'attribute' => 'type',
                                  'filter' => false,
                                  'value' => function ($model) {
                                     return ucfirst($model['type']);
                                   },
                                   'contentOptions' => ['style' => 'width: 100px;']
                                ],
				[
                                 'header' => 'Mac ID',
                                 'filter' => false,
                                 'value' => function ($model) {
                                   return ucfirst($model['mac']);
                                   },
                                 'format' => 'raw',
                                ],
				
                                [
                                  'header' => 'Device ID',
                                     'filter' => false,
                                     'value' => function ($model) {
                                      return $model['device_id'];
                                     },
                                    'format' => 'raw',
                                ],
				[
                                  'header' => 'Usage',
                                     'filter' => false,
                                     'value' => function ($model) {
                                      return round($model['uptime_value'],2)." Hours";
                                     },
                                    'format' => 'raw',
                                ],
				/*
                               	[
                                   'header' => 'Event Date',
                                   'attribute' => 'date',
                                   'filter' => false,
                                    'value' => function ($model) {
                                      return $model['event_date'] != null ? Yii::$app->formatter->asDatetime($model['event_date'], "php:h:i:s A") : 'Not Available';
                                   },
                                    'contentOptions' => ['style' => 'width: 100px;']
                               	],
				[
                                   'header' => 'Added On',
                                   'attribute' => 'date',
                                   'filter' => false,
                                    'value' => function ($model) {
                                      return $model['added_on'] != null ? Yii::$app->formatter->asDatetime($model['added_on'], "php:d-m-Y") : 'Not Available';
                                   },
                                    'contentOptions' => ['style' => 'width: 100px;']
                                ]
				*/
			//	[
                          //           'header' => 'Start Time',
                              //       'filter' => false,
                            //         'value' => function ($model) {
                                  //       return '';
                                //     },
                                    // 'format' => 'raw',
                                 //],
				//[
                                  //   'header' => 'End Time',
                                    // 'filter' => false,
                                    // 'value' => function ($model) {
                                      //   return '';
                                     //},
                                    // 'format' => 'raw',
                                // ],
			//	[
                          //           'header' => 'Duration',
                            //         'filter' => false,
                              //       'value' => function ($model) {
                                //         return '';
                                  //   },
                                    // 'format' => 'raw',
                                // ],
                                // [
                                //     'label' => 'Start Time',
                                //     'filter' => false,
                                //     'value' => function ($model) {
                                //         return $model->start_time != null ? Yii::$app->formatter->asDatetime($model->start_time, "php:h:i:s A") : 'Not Available';
                                //     },
                                // ],
                                // [
                                //     'label' => 'End Time',
                                //     'filter' => false,
                                //     'value' => function ($model) {
                                //         return $model->end_time != null ? Yii::$app->formatter->asDatetime($model->end_time, "php:h:i:s A") : 'Not Available';
                                //     },
                                // ],
                                // [
                                //     'header' => 'Duration',
                                //     'attribute' => 'duration',
                                //     'filter' => false,
                                //     'value' => function ($model) {
                                //         return $model->duration . '<b> Hrs</b>';
                                //     },
                                //     'format' => 'html',
                                // ],
                                // [
                                //     'header' => 'Description',
                                //     'filter' => false,
                                //     'value' => function ($model) {
                                //         return $model->issue_description != null ? $model->issue_description : '-NA-';
                                //     },
                                //     'format' => 'raw',
                                //     'contentOptions' => ['style' => 'width: 250px;']
                                // ],
                                //[
                                  //  'header' => 'Action',
                                    //'class' => 'yii\grid\ActionColumn',
                                   // 'template' => '{view}',
                                   // 'buttons' => [
                                     //   'view' => function ($url, $model) {
                                       //     if (Yii::$app->user->can('/yadmin/process/powerlog/view')) {
                                         //       return Html::a('<span class="btn btn-xs btn-primary fa fa-eye"></span>', ['/yadmin/process/powerlog/view', 'id' => $model['school_id'], 'date' => $model['date']], [
                                           //         'title' => Yii::t('app', 'View'),
                                             //       'data-pjax' => "0",
                                        //]);
                                          //  }
                                       // },
                                      
                                    //],
                                  //  'contentOptions' => ['style' => 'width: 100px;']
                                //],
			],
                        ]);
                        ?>
                        <?php Pjax::end(); ?>
			
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
