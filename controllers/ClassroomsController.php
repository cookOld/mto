<?php

namespace app\modules\mto\controllers;
use app\modules\schedule\models\classrooms\ClassroomsSearch;
use yii\web\Controller;
use Yii;
/**
 * Default controller for the `mto` module
 */
class ClassroomsController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $searchModel = new ClassroomsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render("index", [
            "searchModel" => $searchModel,
            "dataProvider" => $dataProvider
        ]);
    }
    
}
