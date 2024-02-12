<?php
use app\models\helpers\Tab;
use app\modules\schedule\models\classrooms\Classrooms;
use yii\web\View;

$request = Yii::$app->db->createCommand('SELECT building_id, name FROM schedule_classrooms WHERE id=:id')->bindValue(':id', Yii::$app->request->get('id'))->queryOne();
echo '<h3 class="text-themecolor m-b-0 m-t-0">Аудитория '.$request['building_id'].'к/'.$request['name'].'</h3>';
$this->title = "Аудитория ".$request['building_id'].'к/'.$request['name'];
$this->params["breadcrumbs"][] = ["label" => "МТО", "url" => ["/mto/classrooms"]];
$this->params["breadcrumbs"][] = ["label" => $request['building_id'].'к/'.$request['name'], "url" => ['/mto/'.Yii::$app->request->get('id').'/equip']];
Tab::output($this, [
    "main" => "Материально-техническое обеспечение",
    "comps" => "Компетенции",
], [
    "model" => $model,
    "id"=>$id,
    "comps"=>$comps,
    "plansquare"=> $plansquare
]);

echo "<div class=\"card\">";
echo "</div>\n";
