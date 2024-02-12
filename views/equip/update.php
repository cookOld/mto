<?
$this->title = "Изменение";
$this->params["breadcrumbs"][] = ["label" => "МТО", "url" => ["/mto/classrooms"]];
$this->params["breadcrumbs"][] = ["label" => $equip['classroom_id'], "url" => ['/mto/'.$equip['classroom_id'].'/equip']];
$this->params["breadcrumbs"][] = ["label" => "Изменение", "url" => ["/mto/equip/".$equip['id']."/update"]];
?>
<div class="card-body">
    <div class="classrooms-create">
        <div class="classrooms-form">
            <form id="w0" action="/mto/equip/update" method="post">
                <input type="hidden" name="_csrf" value="w5Hw5pKA7b751EMnyx8I-So5yu23DzdLq2l8bgji3Oqx-93f1Oim_Mu7dle_Zm_NbU-chc9ZTXzRGhkiaoOOoA==">
                    <h4 class="card-title">МТО: Оборудование</h4><hr class="m-b-30">
                    <div class="col-9">
                        <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="form-group row field-classrooms-name required">
                            <label class="col-3 col-form-label" for="classrooms-name">Наименование оборудования</label>
                            <div class="col-9">
                            <input type="text" id="classrooms-name" class="form-control" name="name" maxlength="255" aria-required="true" value="<? echo $equip['name']; ?>">
                            </div>
                            <label class="col-3 col-form-label" for="classrooms-name">Количество</label>
                            <div class="col-9">
                            <input type="text" id="classrooms-name" class="form-control" name="count" maxlength="255" aria-required="true" value="<? echo $equip['count']; ?>">
                            </div>
                            <label class="col-3 col-form-label" for="classrooms-name">Материально отвественное лицо</label>
                            <div class="col-9">
                            <input type="text" id="classrooms-name" class="form-control" name="mol" maxlength="255" aria-required="true" value="<? echo $equip['mol']; ?>">
                            <input type="hidden" name="id" value="<? echo $equip['id'];?>">
                            </div>
                <div class="m-t-40 m-b-0"><button type="submit" class="btn btn-success">Сохранить</button><a class="m-l-5 btn btn-outline-secondary" href="/mto/equip?id=<?echo $equip['classroom_id']?>">Отменить</a></div>
            </form>
        </div>
   </div>
</div>