<?php
use app\models\helpers\BooleanColumn;
use app\models\helpers\MenuColumn;
use app\modules\schedule\models\classrooms\Classrooms;
use yii\grid\SerialColumn;
use app\modules\schedule\models\classrooms\Buildings;
use app\modules\schedule\models\lists\ClassroomTypes;
use app\modules\state\models\departments\Departments;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
$this->title = "МТО: Аудитории";
$this->params["breadcrumbs"][] = ["label" => "МТО Аудитории", "url" => ["/mto/classrooms"]];
?>
<?php
Pjax::begin();

echo GridView::widget([
    "dataProvider" => $dataProvider,
    "filterModel" => $searchModel,
    "columns" => [
        ["class" => SerialColumn::class],
        [
            "attribute" => "name",
            "format" => "raw",
            "value" => static function ($model) use ($table) {
                return Html::a(Classrooms::format($model->id), ["/mto/equip", "id" => $model->id]);
            }
        ],
        [
            "attribute" => "building_id",
            "value" => static function ($model) {
                return $model->building->name;
            },
        ],
        // ... другие столбцы ...
        [
            'label' => 'МТО',
            'format' => 'raw',
            'value' => static function ($model) {
                return Html::a('<i class="fa fa-cogs"></i>', ["/mto/equip", "id" => $model->id]);
            }
        ],
    ]
]);

Pjax::end();
