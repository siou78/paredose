<?php
use yii\helpers\Html;
?>
<div class="btn-group">
    <p>
        <?php foreach($params['items'] as $key => $value) : ?>
        <?php echo Html::a($value['text'], $value['url'], $value['htmlOptions']); ?>
        <?php endforeach; ?>
    </p>
</div>