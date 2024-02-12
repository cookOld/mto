<?php
namespace app\modules\mto\models\equip;

use app\common\plans\EducationPlans;
use yii\db\ActiveRecord;
use app\modules\mto\models\equip\Competencies;

class Competenciess extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    /**
     * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
     */
    public static function tableName()
    {
        return '{{mto_competenciess}}';
    }
    public function getCompetenciq(){
        return $this->hasOne(Competencies::class,['id' => 'competencie']);
    }
}