<?= $this->Html->css('../bower_components/fullcalendar/dist/fullcalendar.min.css', ['block' => 'custom']) ?>
<?= $this->Html->css('../bower_components/fullcalendar/dist/fullcalendar.print.min.css', ['block' => 'custom', 'media' => 'print']) ?>
<?= $this->Html->script(['../bower_components/fullcalendar/dist/fullcalendar.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['../bower_components/fullcalendar/dist/locale/pt-br.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['admin/fullcalendar.js',], ['block' => 'custom']) ?>
<script>
    let urlFeed = "<?= $this->Url->build(['controller' => 'Events', 'action' => 'feed',])?>";
    let urlUpdateEvent = "<?= $this->Url->build(['controller' => 'Events', 'action' => 'updateEvent'])?>";
    let addEventTypeCustom = "<?= $this->Url->build(['controller' => 'Events', 'action' => 'addEventTypeCustom',])?>";
    let urlListEventsTypes = "<?= $this->Url->build(['controller' => 'EventsTypes', 'action' => 'listAllAjax',])?>";
</script>
<div class="row">
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Tipos de Eventos</h4>
            </div>
            <div class="box-body">
                <div id="external-events">
                </div>
            </div>
        </div>
        <?php if ($allowedAddEventType) { ?>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Criar Evento</h3>
                </div>
                <div class="box-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <ul class="fc-color-picker" id="color-chooser">
                            <?php foreach (\App\Utils\Enum\EventsColorsEnum::ARRAY_STR as $color => $name) {
                                echo "<li><a class='text-" . strtolower($name) . "' href='#' data-color='{$color}'><i class='fa fa-square'></i></a></li>";
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Titulo do Evento">
                        <div class="input-group-btn">
                            <button id="add-new-event" type="button" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <div id="calendar-events" class="fc fc-unthemed fc-ltr">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #external-events div {
        color: #ffffff;
    }
</style>
