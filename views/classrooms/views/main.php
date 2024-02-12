<?php
use app\models\interfaces\FormattableActiveRecord;
use app\modules\schedule\models\classrooms\Buildings;
use app\modules\schedule\models\classrooms\Classrooms;
use app\modules\schedule\models\lists\ClassroomTypes;
use app\modules\state\models\departments\Departments;
use yii\bootstrap4\Html;

echo "<div class=\"card-body\">";
echo "    <div class=\"row\">";
echo "        <div class=\"col-9\">";
echo "            <div class=\"row\">";
echo "                <div class=\"col-9\">";
echo "                    <div class=\"row\">";
echo "                        <div class=\"col-12\">";
echo "                            <div class=\"row\">";
echo "                                <div class=\"col-4\">";
echo "                                    <div class=\"form-group\">";
echo "                                        <label class=\"control-label\">";
echo \app\models\helpers\Html::valueBlock($model->getAttributeLabel("name"), Classrooms::format($model->id));
echo "                                        </label>";
echo "                                    </div>";
echo "                                </div>";
echo "                                <div class=\"col-4\">";
echo "                                    <div class=\"form-group\">";
echo "                                        <label class=\"control-label\">";
echo \app\models\helpers\Html::valueBlock($model->getAttributeLabel("classroom_type_id"), ClassroomTypes::format($model->classroom_type_id));
echo "                                        </label>";
echo "                                    </div>";
echo "                                </div>";
echo "                                <div class=\"col-4\">";
echo "                                    <div class=\"form-group\">";
echo "                                        <label class=\"control-label\">";
echo \app\models\helpers\Html::valueBlock($model->getAttributeLabel("disciplinesIds"), !empty($model->disciplinesIds) ? implode(", ", array_map(static function ($item) {
    return $item->name;
}, $model->disciplinesIds)) : "[Ваш текст]");
echo "                                        </label>";
echo "                                    </div>";
echo "                                </div>";
echo "                            </div>";
echo "                        </div>";
echo "                        <div class=\"col-12\">";
echo "                            <div class=\"row\">";
echo "                                <div class=\"col-12\">";
echo "                                    <div class=\"row\">";
echo "                                        <div class=\"col-6\">";
echo "                                            <div class=\"form-group\">";
echo "                                                <label class=\"control-label\">";
echo \app\models\helpers\Html::valueBlock($model->getAttributeLabel("building_id"), Buildings::format($model->building_id, FormattableActiveRecord::FORMAT_FULL));
echo "                                                </label>";
echo "                                            </div>";
echo "                                        </div>";
echo "                                        <div class=\"col-6\">";
echo "                                            <div class=\"form-group\">";
echo "                                                <label class=\"control-label\">";
echo \app\models\helpers\Html::valueBlock($model->getAttributeLabel("controlTypesIds"), !empty($model->controlTypesIds) ? implode(", ", array_map(static function ($item) {
    return $item->name;
}, $model->controlTypesIds)) : "<span class=\"text-muted\">[Ваш текст]</span>");
echo "                                                </label>";
echo "                                            </div>";
echo "                                        </div>";
echo "                                    </div>";
echo "                                </div>";
echo "                            </div>";
echo "                        </div>";
echo "                    </div>";
echo "                </div>";
echo "            </div>";
echo "        </div>";
echo "    </div>";
echo "    <div class=\"row\">";
echo "        <div class=\"col-12\">";
echo "            <div class=\"card-footer\">";
echo "                <i class=\"fas fa-pencil-alt\"></i> ";
echo Html::a("<i class=\"far fa-edit\"></i> Редактировать", ["update", "id" => $model->id], ["class" => "nav-link"]);
echo "                <i class=\"fas fa-trash-alt\"></i> ";
echo Html::a("<i class=\"far fa-trash-alt\"></i> Удалить", ["delete", "id" => $model->id], ["class" => "nav-link", "data-method" => "post", "data-confirm" => "Вы уверены, что хотите удалить этот элемент?"]);
echo "            </div>";
echo "        </div>";
echo "    </div>";
echo "</div>";
