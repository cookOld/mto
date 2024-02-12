<? use yii\grid\GridView;
use app\modules\mto\models\equip\Competenciess;
use yii\data\ActiveDataProvider;
use app\models\helpers\MenuColumn;

?>
<?
$dataProvider = new ActiveDataProvider([
    'query' => Competenciess::find()->where(['class'=>$id])->joinWith('competenciq'),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
function getName($id){
    $request = Yii::$app->db->createCommand('SELECT name FROM plan_education_plans WHERE id=:id')->bindValue(':id', $id)->queryOne();;
    return $request['name'];
};
?>
<? echo GridView::widget([
        'dataProvider' =>$dataProvider,
        'columns' => [
            [
                'header' => 'Компетенция',
                'value' => function ($data) {
                    return $data->competenciq["description"];
                },
            ],
            [
                'header' => 'Программа',
                'value' => function ($data) {
                    return getName($data->competenciq["education_plan_id"]);
                },
            ],
        ],
    ]); ?>
<a class="btn btn-outline-success btn-lg" href="/mto/equip/compcreate?id=<? echo $id?>"><i class="fa fa-plus"></i> Добавить</a>