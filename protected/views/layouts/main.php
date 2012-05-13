<?PHP
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/script.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/libs/modernizr-2.5.3.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?PHP echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="navbar navbar-fixed-top" style="position:static;">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#">The Recipe Book</a>
                    <form class="navbar-search pull-right">
                        <input type="text" class="search-query" placeholder="Search">
                    </form>
                    <ul class="nav pull-right">
                        <li><a href="#">New Recipe</a></li>
                        <li><a href="#">List Recipes</a></li>
                        <li class="divider-vertical"></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if (isset($this->breadcrumbs)): ?>
            <div class="container">
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            </div>
        <?php endif ?>

        <?php echo $content; ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
    </body>
</html>
