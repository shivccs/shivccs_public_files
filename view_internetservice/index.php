<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\yadmin\modules\process\models\ManpowerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manpowers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manpower-index">
    <div class='row'>
        <div class='col-sm-12'>
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Internet Service Update Status</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                    </div>                        
                </div>
            </div>
            <div class="box box-info">
                <div class='box-body box-no-padding'>
                    <div class='box-body box-no-padding'>
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
//                        'filterModel' => $searchModel,
                            'pjax' => true,
                            'pjaxSettings' => [
                                'options' => [
                                    'enablePushState' => false,
                                ]
                            ],
                            'responsive' => true,
                            'hover' => true,
                            'layout' => '{items}',
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'header' => 'School Name',
                                    'attribute' => 'school_id',
                                    'filter' => false,
                                    'value' => function ($model) {
                                        return $model->school_id != null ? $model->school->school_name : 'Not Available';
                                    },
                                ],
                                [
                                    'header' => 'Designation',
                                    'attribute' => 'role_id',
                                    'filter' => false,
                                    'value' => function ($model) {
                                        return $model->role_id != null ? $model->designation->designation_name : 'Not Available';
                                    },
                                ],
                                [
                                    'header' => 'No. Of Resources',
                                    'attribute' => 'no_of_employee',
                                    'filter' => false,
                                    'value' => function ($model) {
                                        return $model->no_of_employee != null ? $model->no_of_employee : 'Not Available';
                                    },
                                ],
                                [
                                    'header' => 'Action',
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update}',
                                    'buttons' => [
                                        'update' => function ($url, $model) {
                                            if (Yii::$app->user->can('/yadmin/process/manpower/update', ['id' => $model->id])) {
                                                return Html::a('<span class="btn btn-xs btn-primary fa fa-edit"></span>', ['/yadmin/process/manpower/update', 'id' => $model->id], [
                                                            'title' => Yii::t('app', 'Update'),
                                                            'data-pjax' => "0",
                                                ]);
                                            }
                                        }
                                    ],
                                    'contentOptions' => ['style' => 'width: 50px;']
                                ],
                            ],
                        ]);
                        ?>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>

