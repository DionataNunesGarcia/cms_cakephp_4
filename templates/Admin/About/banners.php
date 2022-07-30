<?php if ($entity->id) { ?>
    <div class="box">
        <?= $this->element('admin/box-title', ['title' => 'Banners']) ?>
        <div class="box-body">
            <?=
            $this->element('admin/multi-upload', [
                'foreignKey' => $entity->id,
                'model' => 'Banners',
                'accept' => 'image/*',
                'sizeImages' => '1349 × 646 px',
            ]);
            ?>
        </div>
    </div>
<?php } ?>
