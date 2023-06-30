<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use app\modules\yadmin\modules\process\helpers\SchoolHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\yadmin\modules\master\models\TrainingBatch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manpower-form">

    <?php
    $form = ActiveForm::begin([
                'id' => 'manpower-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => true,
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-3 control-label'],
                ],
    ]);
    ?>

    <?=
    $form->field($model, 'project_id')->widget(Select2::classname(), [
        'data' => SchoolHelper::ProjectOption(Yii::$app->user->identity->role, Yii::$app->user->identity->project_id),
        'options' => ['placeholder' => 'Search & Select Project'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <?= $form->field($model, 'not_working_schools')->textInput() ?>

    <?= $form->field($model, 'reason')->textInput() ?>

    <?=
    $form->field($model, 'on_date')->widget(
            DatePicker::className(), [
        'type' => DatePicker::TYPE_INPUT,
        'options' => [
            'readonly' => true,
            'placeholder' => 'Select Date',
            'value' => $model->on_date != NULL ? Yii::$app->formatter->asDatetime($model->on_date, "php:d-m-Y") : "",
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'endDate' => date("d M Y", strtotime("0 day", strtotime(date('d M Y')))),
            'todayHighlight' => true,
            'format' => 'dd-mm-yyyy'
        ],
    ]);
    ?>

    <div class="form-actions form-actions-padding-sm">
        <div class="row">
            <div class="col-md-10 col-md-offset-3">
                <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-primary']) ?>
                <a href="/yadmin/process/internetservice/create"><input type="button" class="btn" value="Cancel" /></a>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
