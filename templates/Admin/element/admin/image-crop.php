<?php
echo $this->Form->hidden('upload.image_upload_temp', [
    'value' => $imageName
]);
echo $this->Html->image($image, ['label' => false, 'class' => 'img-responsive img-thumbnail image-crop-temp img-circle']);
