<link rel="stylesheet" type="text/css" href="<?php echo SITE_THEME; ?>images/hkbase.css?v=<?=rand()?>" />
<div class="sub_trend_menu">
	<div class="links_form"> 
<a href="./index.php?c=content&a=list&catid=2">即时开奖</a> 
<?php $i=1;  if (is_array($cats)) { $count=count($cats);foreach ($cats as $t) {  if ($t['parentid']==2) {  if ($i<9) { ?>
<span>|</span><a href="<?php echo $t['url']; ?>" <?php if ($catid==$t['catid']) { ?>class="a"<?php } ?>><?php echo $t['catname']; ?></a>
<?php }  $i++;  }  } } ?>
		<div class="g_clear"></div>
	</div>
	<div class="g_clear"></div>
</div>