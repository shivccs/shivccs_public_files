<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\yadmin\modules\process\models\Manpower */

$this->title = 'Manpower Details';
$this->params['breadcrumbs'][] = ['label' => 'Manpowers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manpower-create">
<div class='row'>
        <div class='col-sm-12'>        
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus-circle"></i>  Internet Service Status</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                        <?php
                        //if (Yii::$app->user->can('/yadmin/process/manpower/index')) {
                            //echo Html::a('<i class="fa fa-table"></i> Manpower Details List', ["index"], ['class' => 'btn btn-primary btn-xs']);
                        //}
                        ?>
                    </div>                        
                </div>
            </div>
            <div class="box box-info">
                <div class='box-body box-no-padding'>
                    <div class='box-body box-no-padding'>

                        <?=
                        $this->render('_form', [
                            'model' => $model,
                        ])
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
