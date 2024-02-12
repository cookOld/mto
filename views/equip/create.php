<?php
$this->title = "Добавление оборудования";
$this->params["breadcrumbs"][] = ["label" => "МТО", "url" => ["/mto/classrooms"]];
$this->params["breadcrumbs"][] = ["label" => $classroom_id, "url" => ['/mto/'.$classroom_id.'/equip']];
$this->params["breadcrumbs"][] = ["label" => "Добавление оборудования", "url" => ["/mto/equip/create?id=".$classroom_id]];
?>
<div class="card-body">
    <div class="classrooms-create">
        <div class="classrooms-form">
            <form id="w0" action="/mto/equip/create" method="post">
                <input type="hidden" name="_csrf" value="w5Hw5pKA7b751EMnyx8I-So5yu23DzdLq2l8bgji3Oqx-93f1Oim_Mu7dle_Zm_NbU-chc9ZTXzRGhkiaoOOoA==">
                    <h4 class="card-title">МТО: Оборудование</h4><hr class="m-b-30">
                        <div class="col-9">
                            <div class="form-group row field-classrooms-name required">
                                <label class="col-3 col-form-label" for="classrooms-name">Наименование оборудования</label>
                            <div class="col-9">
                                <input type="text" id="classrooms-name" class="form-control" name="name" maxlength="255" aria-required="true">
                            </div>
                                <label class="col-3 col-form-label" for="classrooms-name">Количество</label>
                            <div class="col-9">
                                <input type="text" id="classrooms-name" class="form-control" name="count" maxlength="255" aria-required="true">
                            </div>
                            <label class="col-3 col-form-label" for="classrooms-name">Материально отвественное лицо</label>
                            <div class="col-9">
                                <input type="text" id="classrooms-name" class="form-control" name="mol" maxlength="255" aria-required="true">
                                <input type="hidden" name="classroom_id" value="<? echo $classroom_id;?>">
                            </div>
                        </div>
                <div class="m-b-0">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <a class="m-l-5 btn btn-outline-secondary" href="/mto/equip?id=<?echo $classroom_id?>">Отменить</a>
                </div>
            </form>
        </div>
    </div>
</div>