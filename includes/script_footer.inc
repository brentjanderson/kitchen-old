<?PHP defined('_kexec') or die; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<script src="js/plugins.js?<?PHP echo time(); ?>"></script>
<script src="js/script.js?<?PHP echo time(); ?>"></script>
<script src="js/libs/bootstrap.min.js?<?PHP echo time(); ?>"></script>

<script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<script>
$('ul.dropdown-menu li a').click(function() {
    var el = $(this).html();
});
</script>
