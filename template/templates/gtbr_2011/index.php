<!DOCTYPE html>
<?php
$menu = JSite::getMenu();
if ($menu) { $menu = $menu->getActive(); }
if ($menu) { $menu = $menu->alias; }

$domain = $_SERVER['HTTP_HOST'];
$testing = (strpos($domain, '.local:8888') !== false || 
			strpos($domain, '.ccistaging.com') !== false ||
			strpos($domain, 'dev.') !== false);
			
//remove mootools.js and caption.js
$headerstuff=$this->getHeadData();
reset($headerstuff['scripts']);
foreach($headerstuff['scripts'] as $key=>$value){
	unset($headerstuff['scripts'][$key]);
}		
$this->setHeadData($headerstuff);			
?>
<html>
<head>
	<meta charset="utf-8" />
	<jdoc:include type="head" />

	<?php if ($testing): ?>
		<meta name="robots" content="nofollow, noindex" />
	<?php endif; ?>
	
	<!-- styles -->
	<?php if ($testing): ?>
		<!--<link href="/templates/gtbr_2011/less/template.less" rel="stylesheet/less" /><!-- -->
		<link href="/templates/gtbr_2011/css/template.css" rel="stylesheet" /><!-- -->
		<script src="http://lesscss.googlecode.com/files/less-1.0.41.min.js"></script>
		<script>
			less.env = "development";
			less.watch();
		</script>
	<?php else: ?>
		<link href="/templates/gtbr_2011/css/template.css" rel="stylesheet" />
	<?php endif; ?>
	
	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools.js" /></script>
	<script src="/templates/gtbr_2011/js/mootools-more.js"></script>
	<script src="https://github.com/matsko/Mootools-window.onhashchange/raw/master/onhashchange.js"></script>
	<?php if ($testing): ?>
		<script src="/templates/gtbr_2011/js/rollover.js"></script>
		<script src="/templates/gtbr_2011/js/ajax.js"></script>
	<?php else: ?>
		<script src="/templates/gtbr_2011/js/scripts.min.js"></script>
	<?php endif; ?>
	
	<!-- fonts -->
	<script type="text/javascript" src="http://use.typekit.com/pei1aav.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body>
	<?php if (!$testing): ?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-XXXX-X']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	<?php endif;?>
	
	<div id="wrapper"><div>
		<div id="header">
			<jdoc:include type="modules" name="header" />
			<div class="clr"></div>
		</div>
		
		<div id="menu">
			<jdoc:include type="modules" name="menu" style="xhtml" />
			<div class="clr"></div>
		</div>
		
		<div id="body">
			<div id="component"><jdoc:include type="component" /></div>
			<div class="clr"></div>
		</div>
		
		<div id="bottom1">
			<jdoc:include type="modules" name="bottom1" style="xhtml" />
			<div class="clr"></div>
		</div>
		<div id="bottom2">
			<jdoc:include type="modules" name="bottom2" style="xhtml" />
			<div class="clr"></div>
		</div>
		
		<div id="footer">
			<div class="position-left">&copy; Get The Ball Rolling <?php echo date('Y'); ?></div>
			<div class="position-right">Site By <a href="http://ccistudios.com" target="_blank">CCI Studios</a></div>
			<jdoc:include type="modules" name="footer" style="xhtml" />
			<div class="clr"></div>
		</div>
	</div></div>
	
	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>
</body>
</html>