<?php
namespace app\modules\mto;
use app\common\controllers\GroupsController;
use app\models\events\Notifications;
use app\models\users\Groups;
use Yii; use yii\db\Query; use yii\helpers\ArrayHelper;
use yii\web\Application;
class Module extends \app\models\interfaces\Module {
    public string $name = "МТО";
    public string $iconClass ="fast fa-calendar-alt";
    public string $description = "Новая строка";
    public int $sort = 1;
    public string $defaultController = "default";
    public function getMenuItems() : array {
      return [
          ["name" => "Аудитории", "action" => "/mto/classrooms", "role" => Groups::USER_EDITOR, "access" => ""],
      ]
      ;
    } 
}

