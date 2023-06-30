<?php

namespace app\modules\yadmin\modules\process\models;

use Yii;
use \yii\db\Expression;

/**
 * This is the model class for table "tbl_manpower".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $school_id
 * @property integer $role_id
 * @property integer $no_of_employee
 */
class Internetservice extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_internetservice';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['project_id', 'not_working_schools', 'reason', 'on_date'], 'required', 'message' => 'This field is required'],
            [['project_id', 'not_working_school'], 'integer'],
	    [['reason'], 'string', 'max' => 200],
	    [['on_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'project_id' => 'Project Name',
            'not_working_school' => 'School with Internet Not Working',
            'reason' => 'Reason of Service Intruption',
            'on_date' => 'Date of Problem',
        ];
    }

   public function beforeSave($insert) {

        if ($this->isNewRecord) {
            $this->create_on = new Expression('NOW()');
            $this->create_by = \Yii::$app->user->identity->id;
        } else {
            $this->update_on = new Expression('NOW()');
            $this->update_by = \Yii::$app->user->identity->id;
        }

        return parent::beforeSave($insert);
    }

}
