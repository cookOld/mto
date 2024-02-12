<?
$this->title = "Добавление компетенций";
$this->params["breadcrumbs"][] = ["label" => "МТО", "url" => ["/mto/classrooms"]];
$this->params["breadcrumbs"][] = ["label" => $id, "url" => ['/mto/'.$id.'/equip']];
$this->params["breadcrumbs"][] = ["label" => "Добавление компетенций", "url" => ["/mto/equip/compcreate?id=".$id]];
?>
<div class="card-body">
  <? for($i=0; $i < count($plans); $i++){?>
  <a class="m-l-5 btn btn-outline-secondary" href="/mto/equip/compcreate1?id=<?echo $id;?>&plan=<? echo $plans[$i]['id']; ?>">
    <? echo $plans[$i]['name']; ?>
  </a>
  <?};?>
</div>
<a class="m-l-5 btn btn-outline-secondary" href="/mto/equip?id=<?echo $id?>&tab=comps">Отменить</a>