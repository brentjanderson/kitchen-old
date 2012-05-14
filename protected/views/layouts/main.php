<?PHP
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/script.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/libs/modernizr-2.5.3.min.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/libs/bootstrap.min.js', CClientScript::POS_END);
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?PHP echo Yii::app()->request->baseUrl; ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?PHP echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?PHP echo Yii::app()->request->baseUrl; ?>/css/kitchen.css">

        <meta name="viewport" content="width=960">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
        <div class="navbar navbar-fixed-top" style="position:static;">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="/">Mom's Kitchen</a>

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