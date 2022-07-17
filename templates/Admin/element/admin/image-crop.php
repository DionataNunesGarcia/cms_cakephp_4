<?php
echo $this->Form->hidden('imagem_upload_temp', ['value' => $imageName]);
echo $this->Html->image($imagem, ['label' => false, 'class' => 'img-responsive img-thumbnail image-crop-temp img-circle']);
