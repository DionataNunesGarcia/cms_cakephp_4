<div class="box-header with-border">
    <h3 class="box-title">
        <?php
        $title = $title ?? $this->fetch('title');
        if (isset($title)) {
            echo $title;
        }else{
             echo $this->fetch('title');
        }
        ?>
    </h3>
    <?php if (!isset($collapse) || $collapse) { ?>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    <?php } ?>
</div>
