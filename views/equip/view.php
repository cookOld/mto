
<ul class="nav nav-tabs customtab">
            <li class="nav-item">
            <a href="/mto/equip/view?id=<? echo $classroom_id?>" class="nav-link active">МТО</a>
        </li>
            <li class="nav-item">
            <a href="/mto/tech" class="nav-link">МТО2</a>
        </li>
    </ul>
<div class="tab-content">
        <div class="tab-pane active">
            <div class="card-body">
                <div class="classrooms-index">

                    <div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">
<h2>МТО аудитории <? echo $classroom_id-1?></h2>
<a href="/schedule/classrooms">Назад</a>                    
<script>
    var GridSettings = function() {
        var showModal = function(id) {
            var select = $('select[name="Filter[columns][]"]');
            var table = $('#' + id + ' > table');

            select.multiSelect({
                selectableHeader: '<h5>Все колонки</h5>',
                selectionHeader: '<h5>Выбранные</h5>',
            });

            var allColumns = $.parseJSON($('.grid-settings[data-id="' + id + '"]').attr('data-columns'));
            var columnIds = Object.keys(allColumns);

            select.empty();

            var settings = $('input[name="Filter[settings][' + id + ']"]').val() == '' ?
                {} :
                $.parseJSON($('input[name="Filter[settings][' + id + ']"]').val());

            if (typeof settings != 'object' || settings == null)
                settings = {};
            if (settings[ 'columns' ] == undefined)
                settings[ 'columns' ] = columnIds;

            for (var i in columnIds)
                select.append($('<option value="' + columnIds[ i ] + '"' + (settings.columns.indexOf(columnIds[ i ]) != -1 ? ' selected' : '') + '>' + allColumns[ columnIds[ i ] ] + '</option>'));

            select.multiSelect('refresh');

            $('#columns-modal').attr('data-id', id);
            $('#columns-modal').modal();
        };

        var bindSaveData = function() {
            $('#columns-modal').find('.modal-footer .btn-ok').click(function (e) {
                e.preventDefault();

                $('#columns-modal').find('.modal-footer .btn-ok').find('.spinner-border').remove();
                $('#columns-modal').find('.modal-footer .btn-ok').prepend($('<span class="spinner-border spinner-border-sm m-r-10"></span>'));

                $.post('/settings/ajax-grid', {
                    _csrf: yii.getCsrfToken(),
                    route: $('.grid-settings[data-id="' + $('#columns-modal').attr('data-id') + '"]').attr('data-route'),
                    filter: $('#' + $('#columns-modal').attr('data-id')).attr('data-filter') != undefined ?
                        $('#' + $('#columns-modal').attr('data-id')).attr('data-filter') : 'Filter',
                    code: 'columns',
                    value: {
                        columns: $('#columns-modal').find('select[name="Filter[columns][]"]').val()
                    }
                }).always(function() {
                    $('#columns-modal').find('.modal-footer .btn-ok').find('.spinner-border').remove();
                }).done(function(data) {
                    data = $.parseJSON(data);

                    if (data.status == 1)
                        window.location.reload();
                });
            });

            $('#columns-modal').find('.modal-footer .btn-reset').click(function (e) {
                e.preventDefault();

                $('#columns-modal').find('.modal-footer .btn-reset').find('.spinner-border').remove();
                $('#columns-modal').find('.modal-footer .btn-reset').prepend($('<span class="spinner-border spinner-border-sm m-r-10"></span>'));

                var filterCode = $('#' + $('#columns-modal').attr('data-id')).attr('data-filter') != undefined ?
                    $('#' + $('#columns-modal').attr('data-id')).attr('data-filter') : 'Filter';

                $.post('/settings/ajax-grid', {
                    _csrf: yii.getCsrfToken(),
                    route: $('.grid-settings[data-id="' + $('#columns-modal').attr('data-id') + '"]').attr('data-route'),
                    filter: filterCode,
                    code: 'columns',
                    value: null
                }).always(function() {
                    $('#columns-modal').find('.modal-footer .btn-reset').find('.spinner-border').remove();
                }).done(function(data) {
                    data = $.parseJSON(data);

                    if (data.status == 1) {
                        var query = window.location.search.substring(1);
                        var vars = query.split('&');
                        var items = [];
                        for (var i = 0; i < vars.length; i++) {
                            var pair = vars[i].split('=');

                            if (pair[ 0 ].indexOf(filterCode) === 0)
                                continue;

                            items.push(vars[ i ]);
                        }

                        window.location = window.location.pathname + (items.length > 0 ? '?' : '') + items.join('&');
                    }
                });
            });
        };

        var create = function(id) {
            $('.grid-settings[data-id="' + id + '"]').detach().prependTo($('#' + id)).removeAttr('hidden');
            $('.grid-settings[data-id="' + id + '"]').click(function(e) {
                e.preventDefault();

                GridSettings.showModal($(this).attr('data-id'));
            });

            $('.pagesize-selector[data-id="' + id + '"]').change(function() {
                $('#' + $(this).attr('data-id')).find('.summary').find('.spinner-border').remove();
                $('#' + $(this).attr('data-id')).find('.summary').append($('<span class="spinner-border m-l-10"></span>'));

                $.post('/settings/ajax-grid', {
                    _csrf: yii.getCsrfToken(),
                    route: $('.grid-settings[data-id="' + $(this).attr('data-id') + '"]').attr('data-route'),
                    filter: $('#' + $(this).attr('data-id')).attr('data-filter') != undefined ?
                        $('#' + $(this).attr('data-id')).attr('data-filter') : 'Filter',
                    code: 'pagesize',
                    value: $(this).val(),
                }).always(function() {
                    $('.grid-view').find('.summary').find('.spinner-border').remove();
                }).done(function(data) {
                    data = $.parseJSON(data);

                    if (data.status == 1)
                        window.location.reload();
                });
            });

            $('#columns-modal').detach().appendTo($('body'));
        };

        return {
            showModal: function(id) {
                showModal(id);
            },
            bindSaveData: function() {
                bindSaveData();
            },
            create: function(id) {
                create(id);
            },
        };
    }();

    $(function() {
        GridSettings.bindSaveData();
    });
</script>


<input type="hidden" name="Filter[settings][w0]" value="null">


<script>
    $(function() {
        GridSettings.create('w0');
    });
</script><div id="w0" class="grid-view" data-filter="ClassroomsSearch"><a href="#" class="grid-settings" data-id="w0" data-route="schedule/classrooms" data-columns="{&quot;column_0&quot;:&quot;[Действия]&quot;,&quot;column_1&quot;:&quot;№ п/п&quot;,&quot;name&quot;:&quot;Наименование оборудования&quot;,&quot;equip_count&quot;:&quot;Количество&quot;,&quot;responsible&quot;:&quot;Материально отвественное лицо&quot;}">
    <i class="fa fa-cogs"></i> Настройка
</a><table class="table table-bordered table-vertical-align"><thead>
<tr><th class="action-column">&nbsp;</th><th class="serial-column">#</th><th><a class="asc" href="/schedule/classrooms?sort=-name" data-sort="-name">Наименование оборудования</a></th><th><a href="/schedule/classrooms?sort=equip_count" data-sort="equip_count">Количество</a></th><th><a href="/schedule/classrooms?sort=responsible" data-sort="responsible">Материально отвественное лицо</a></th></tr>
</thead>
<tbody>
<?php
    for($i=0; $i < count($equips); $i++){
?>
       <tr data-key="1"><td class="menu-column"><div class="btn-group">
            <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" data-boundary="window">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/schedule/classrooms/1/update" aria-label="Изменить" data-pjax="0"><i class="fas fa-pencil-alt"></i> Изменить</a> <a class="dropdown-item text-danger" href="/mto/equip/delete/?id=<? echo $equips[$i]['id'] ?>&classroom_id=<? echo $classroom_id ?>" aria-label="Удалить" data-pjax="0" data-method="POST" data-confirm="Вы уверены, что хотите удалить этот элемент?"><i class="fa fa-times"></i> Удалить</a>
            </div>
        </div></td><td class="serial-column"><?php echo $equips[$i]['id'];?></td><td><a href="/schedule/classrooms/1"><?php echo $equips[$i]['name'];?></a></td><td><?php echo $equips[$i]['count'];?></td><td><?php echo $equips[$i]['mol'];?></td></tr>
    <?php }?>
</tbody></table>
<div class="row clearfix"><div class="col-6 summary"><div class="summary"><label class="m-r-10" for="">На странице:</label>&nbsp;<select class="form-control pagesize-selector" name="" data-id="w0" data-route="schedule/classrooms">
<option value="10">10</option>
<option value="20" selected="">20</option>
<option value="100">100</option>
<option value="500">500</option>
<option value="-1">Все</option>
</select></div></div><div class="col-6"></div></div></div>
                    </div>
                                            <div class="text-right">
                            <a class="btn btn-outline-success btn-lg" href="/mto/equip/create?id=<? echo $id?>"><i class="fa fa-plus"></i> Добавить</a>                        </div>
                                    </div>
            </div>
        </div>
    </div>
</div>
<script>jQuery(function ($) {
$(function() {
    var currentYear = $('.year-block').attr('data-year');
    var template = $('.year-block').attr('data-template');

    $('#year-selector .params-selector[data-param="year"]').find('.prev').click(function(e) {
        e.preventDefault();

        $(this).closest('.btn-group').find('.btn').not('.prev, .next').each(function() {
            var year = parseInt($.trim($(this).text()));
            $(this).removeClass('active').text(year - 5).attr('href', template.replace('#YEAR#', year - 5));

            if (year - 5 == currentYear)
                $(this).addClass('active');
        });
    });

    $('#year-selector .params-selector[data-param="year"]').find('.next').click(function(e) {
        e.preventDefault();

        $(this).closest('.btn-group').find('.btn').not('.prev, .next').each(function() {
            var year = parseInt($.trim($(this).text()));
            $(this).removeClass('active').text(year + 5).attr('href', template.replace('#YEAR#', year + 5));

            if (year + 5 == currentYear)
                $(this).addClass('active');
        });
    });

    $('#year-selector .params-selector select').change(function() {
        var url = $(this).find('option[value="' + $(this).val() + '"]').attr('data-url');

        if (url != '')
            window.location = $(this).find('option[value="' + $(this).val() + '"]').attr('data-url');
    });
});
jQuery('#w0').yiiGridView({"filterUrl":"\/schedule\/classrooms","filterSelector":"#w0-filters input, #w0-filters select","filterOnFocusOut":true});
jQuery(document).pjax("#p0 a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p0"});
jQuery(document).off("submit", "#p0 form[data-pjax]").on("submit", "#p0 form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p0"});});
});</script>
<div id="columns-modal" class="modal" data-id="w0" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Настройка таблицы</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <select name="Filter[columns][]" class="form-control" multiple="" id="848multiselect" style="position: absolute; left: -9999px;"><option value="column_0" selected="">[Действия]</option><option value="column_1" selected="">№ п/п</option><option value="name" selected="">Наименование оборудования оборудования</option><option value="equip_count" selected="">Количество</option><option value="responsible" selected="">Материально отвественное лицо</option><div class="ms-container" id="ms-848multiselect"><div class="ms-selectable"><h5>Все колонки</h5><ul class="ms-list" tabindex="-1"><li selected="" class="ms-elem-selectable ms-selected" id="-623419001-selectable" style="display: none;"><span>[Действия]</span></li><li selected="" class="ms-elem-selectable ms-selected" id="-623419000-selectable" style="display: none;"><span>№ п/п</span></li><li selected="" class="ms-elem-selectable ms-selected" id="3373707-selectable" style="display: none;"><span>Наименование оборудования</span></li><li selected="" class="ms-elem-selectable ms-selected" id="-1417153914-selectable" style="display: none;"><span>Количество</span></li><li selected="" class="ms-elem-selectable ms-selected" id="1708274260-selectable" style="display: none;"></li><li selected="" class="ms-elem-selectable ms-selected" id="961385768-selectable" style="display: none;"><span>Материально отвественное лицо</span></li><li selected="" class="ms-elem-selectable ms-selected" id="1062436703-selectable" style="display: none;"></li><li selected="" class="ms-elem-selectable ms-selected" id="-1422950650-selectable" style="display: none;"></li></ul></div><div class="ms-selection"><h5>Выбранные</h5><ul class="ms-list" tabindex="-1"><li selected="" class="ms-elem-selection ms-selected" id="-623419001-selection" style=""><span>[Действия]</span></li><li selected="" class="ms-elem-selection ms-selected" id="-623419000-selection" style=""><span>№ п/п</span></li><li selected="" class="ms-elem-selection ms-selected" id="3373707-selection" style=""><span>Наименование оборудования</span></li><li selected="" class="ms-elem-selection ms-selected" id="-1417153914-selection" style=""><span>Количество</span></li><li selected="" class="ms-elem-selection ms-selected" id="1708274260-selection" style=""></li><li selected="" class="ms-elem-selection ms-selected" id="961385768-selection" style=""><span>Материально отвественное лицо</span></li><li selected="" class="ms-elem-selection ms-selected" id="1062436703-selection" style=""></li></ul></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info float-left btn-reset" title="Сбросить"><i class="mdi mdi-refresh"></i></button>

                <button type="button" class="btn btn-outline-info" data-dismiss="modal">Отменить</button>
                <button type="button" class="btn btn-outline-info btn-ok">OK</button>
            </div>
        </div>
    </div>
</div>