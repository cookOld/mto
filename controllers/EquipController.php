<?php

namespace app\modules\mto\controllers;

use Yii;
use yii\web\Controller;
use app\modules\mto\models\equip\Equips;
use app\modules\schedule\models\classrooms\Classrooms;
use app\common\disciplines\Competencies;
use app\modules\mto\models\equip\Competenciess;
use app\common\plans\EducationPlans;
/**
 * Default controller for the `mto` module
 */
class EquipController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($id)
    {
        $model = Classrooms::find($id)
        ->where(['id'=>$id])
        ->all();
        //$competencies = Competencies::find($id)
        //->all();
        $comps = Competenciess::find($id)
        ->where(['class'=>$id])
        ->joinWith('competenciq')
        ->all();
        return $this->render('index', ['model'=>$model, 'comps' =>$comps, 'id'=>$id]);
    }
    public function actionCompcreate()
    {
        $plans = EducationPlans::find()
        ->where(['not', ['parent_id' => null]])
        ->all();
        return $this->render('compcreate',['id'=> Yii::$app->request->get('id'), 'plans' =>$plans]);
    }
    public function actionCompcreate1()
    {
        if (Yii::$app->request->post()){
            $request = Yii::$app->request;
            for($i=0;  $i < count($request->post('items')); $i++){
                $comp = new Competenciess();
                $comp->competencie = $request->post('items')[$i];
                $comp->class = $request->post('id');
                $comp->save();
            }
            return $this->redirect('/mto/equip?id='.$request->post('id').'&tab=comps');
        }
        $competencies = Competencies::find()
        ->where(['education_plan_id' => Yii::$app->request->get('plan')])
        ->all();
        return $this->render('compcreate1',['id'=> Yii::$app->request->get('id'), 'competencies' =>$competencies, 'plan'=> Yii::$app->request->get('plan')]);
    }


    public function actionCreate()
    {
        if (Yii::$app->request->post()){
            $request = Yii::$app->request;
            $equip = new Equips();
            $equip->name = $request->post('name');
            $equip->count = $request->post('count');
            $equip->mol = $request->post('mol');
            $equip->status = 1;
            $equip->classroom_id = $request->post('classroom_id');
            $equip->save();
            return $this->redirect('/mto/equip?id='.$request->post('classroom_id'));
        }
        return $this->render('create',['classroom_id'=> Yii::$app->request->get('id')]);
    }
    public function actionUpdate()
    {
        $request = Yii::$app->request;
        if (Yii::$app->request->post()){
            $equip = Equips::find()
            ->where(['id' => $request->post('id')])
            ->one();
            $gotoback = $equip->classroom_id;
            $equip->name = $request->post('name');
            $equip->count = $request->post('count');
            $equip->mol = $request->post('mol');
            $equip->save();
            return $this->redirect('/mto/equip?id='.$gotoback);
        }
        $equip = Equips::find()
        ->where(['id' => $request->get('id')])
        ->one();
        return $this->render('update',[
            'equip' => $equip,
            'classroom_id'=> Yii::$app->request->get('id')
        ]);
    }
    //клиент нажимает на кнопку и делает вид что проверил оборудование
    public function actionChangestatus()
    {
        if (Yii::$app->request->get()){
            $request = Yii::$app->request;
            $equips = Equips::find()
            ->where(['id' => $request->get('id')])
            ->one();
            $gotoback = $equips->classroom_id;
            if ($equips->status == 1) {
                $equips->status = 0;
            }
            else {
                $equips->status = 1;
            }
            $equips->save();
        }
        return $this->redirect('/mto/equip?id='.$gotoback);
    }
    //клиент нажимает на кнопку и обновляет шо-то
    public function actionCheck(){
        if (Yii::$app->request->get()){
            $request = Yii::$app->request;
            $equips = Equips::find()
            ->where(['id' => $request->get('id')])
            ->one();
            $gotoback = $equips->classroom_id;
            $equips->person = Yii::$app->user->identity->name;
            $equips->persontime = date("Y-m-d H:i:s");
            $equips->save();
            return $this->redirect('/mto/equip?id='.$gotoback);
        }
    }
    public function actionDelete()
    {
        $request = Yii::$app->request;
        $equips = Equips::find()
        ->where(['id' => $request->get('id')])
        ->one();
        $gotoback = $equips->classroom_id;
        $equips->delete();
        return $this->redirect('/mto/equip?id='.$gotoback);
    }
    public function actionView($id){
        $equips = Equips::find()
        ->where(['classroom_id'=>$id])
        ->all();
        return $this->render('view',[
            'equips' => $equips,
            'classroom_id'=>$id
        ]);
    }
}