<?php
namespace app\modules\mto\models\equip;

use yii\db\ActiveRecord;

class Competencies extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    /**
     * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
     */
    public static function tableName()
    {
        return '{{plan_competencies}}';
    }
}