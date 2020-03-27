<div class="sub_trend_menu">
	<div class="links_form"> 
<a href="./index.php?c=content&a=list&catid=8">即时开奖</a>
<?php if (is_array($cats)) { $count=count($cats);foreach ($cats as $t) {  if ($t['parentid']==8) { ?> 
<span>|</span><a href="<?php echo $t['url']; ?>" <?php if ($catid==$t['catid']) { ?>class="a"<?php } ?>><?php echo $t['catname']; ?></a>
<?php }  } } ?>
		<div class="g_clear"></div>
	</div>
	<div class="g_clear"></div>
</div>
