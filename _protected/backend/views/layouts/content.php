<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>
<footer class="main-footer">
    <div class="copyrightWrapper">
        <p>Coypright &amp; <?= date('Y'); ?> {Pare-Dose}. All rights reserved.</p>
    </div>
    <a id="scroll" class="button" href="#top"><i class="fa fa-chevron-up"></i></a>
</footer>