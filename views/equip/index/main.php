<? use yii\grid\GridView;
use app\modules\mto\models\equip\Equips;
use yii\data\ActiveDataProvider;
use app\models\helpers\MenuColumn;
use yii\bootstrap4\Html;
?>
<?
$dataProvider = new ActiveDataProvider([
    'query' => Equips::find()->where(['classroom_id'=>$id]),
    'pagination' => [
        'pageSize' => 20,
    ],
]); 
?>
<? echo GridView::widget([
        'dataProvider' =>$dataProvider,
        'columns' => [
            [
                "class" => MenuColumn::class,
                "visibleButtons" => [
                    "delete" => static function () {
                        return 'd';
                    },
                ]
            ],
            [
                'header' => 'Название',
                'value' => function ($data) {
                    return $data->name;
                },
            ],
            [
                'header' => 'Количество',
                'value' => function ($data) {
                    return $data->count;
                },
            ],
            [
                'header' => 'Ответственное лицо',
                'value' => function ($data) {
                    return $data->mol;
                },
            ],
            [
                'header' => 'Работоспособность',
                'format' => 'raw',
                'value' => static function ($data) {
                    $icon;
                    if ($data->status == 1) {
                        $icon = 'fas fa-check';
                    }
                    else {
                        $icon = 'fas fa-times';
                    }
                    return Html::a('<i class="'.$icon.'"></i>', ["/mto/equip/changestatus", "id" => $data->id]);
                    
                },
            ],
            [
                'header' => 'Проверка оборудования',
                'format' => 'raw',
                'value' => static function ($data) {
                    return Html::a('<i class="fas fa-check"></i>', ["/mto/equip/check", "id" => $data->id]).' '.$data->person.' '.$data->persontime;
                },
            ],
        ],
    ]); ?>
<a class="btn btn-outline-success btn-lg" href="/mto/equip/create?id=<? echo $id?>"><i class="fa fa-plus"></i> Добавить</a>