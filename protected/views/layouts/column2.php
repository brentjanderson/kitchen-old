<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="row">
        <div class="span10">
            <?php echo $content; ?>
        </div>

        <div class="span2">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Tools',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'nav nav-tabs nav-stacked'),
            ));
            $this->endWidget();
            ?>
        </div>
    </div>
</div><!-- content -->
<?php $this->endContent(); ?>