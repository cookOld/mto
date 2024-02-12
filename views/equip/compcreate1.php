<?php
$this->title = "Добавление компетенций";
$this->params["breadcrumbs"][] = ["label" => "МТО", "url" => ["/mto/classrooms"]];
$this->params["breadcrumbs"][] = ["label" => $id, "url" => ['/mto/'.$id.'/equip']];
$this->params["breadcrumbs"][] = ["label" => "Добавление компетенций", "url" => ["/mto/equip/compcreate?id=".$id]];
?>
<div class="card-body">
    <div class="classrooms-create">
         <div class="classrooms-form">
            <form id="w0" action="/mto/equip/compcreate1" method="post">
                <input type="hidden" name="_csrf" value="w5Hw5pKA7b751EMnyx8I-So5yu23DzdLq2l8bgji3Oqx-93f1Oim_Mu7dle_Zm_NbU-chc9ZTXzRGhkiaoOOoA==">
                    <h4 class="card-title">Компетенции</h4><hr class="m-b-30">
                    <div class="col-9">
                        <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="form-group row field-classrooms-name required">
                        <div class="mb-3">
                        <input type="hidden" value="<? echo $id?>" name="id">
                        <label></label>
                        <select class="form-control" multiple="true" style="height:400px;" name="items[]">
                          <?php
                          for($i=0; $i < count($competencies); $i++){
                          ?>
                          <option value="<? echo $competencies[$i]->id; ?>"><?php echo $competencies[$i]->description; ?></option>
                          <?};?>
                        </select>
                      </div>
                        </div>
                <div class="form-submit-block form-group m-t-40 m-b-0"><button type="submit" class="btn btn-success">Сохранить</button><a class="m-l-5 btn btn-outline-secondary" href="/mto/equip?id=<?echo $id;?>&tab=comps">Отменить</a></div>
            </form>
          </div>
   </div>
</div>