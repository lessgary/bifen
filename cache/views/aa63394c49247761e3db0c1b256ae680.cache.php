<link rel="stylesheet" type="text/css" href="<?php echo SITE_THEME; ?>images/hkbase.css?v=<?=rand()?>" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_THEME; ?>images/trendscolor.css" />
<div class="sub_trend_menu">
	<div class="links_form"> 
<a href="./index.php?c=content&a=list&catid=4">即时开奖</a> 
<?php $i=1;  if (is_array($cats)) { $count=count($cats);foreach ($cats as $t) {  if ($t['parentid']==4) {  if ($i<9) { ?>
<span>|</span><a href="<?php echo $t['url']; ?>" <?php if ($catid==$t['catid']) { ?>class="a"<?php } ?>><?php echo $t['catname']; ?></a>
<?php }  $i++;  }  } } ?>
		<div class="g_clear"></div>
	</div>
	<!--
	<div class="links_more"> </div>
	<div class="sub_trend_menu_more g_hide">
		<div class="links">
			<?php $i=1;  if (is_array($cats)) { $count=count($cats);foreach ($cats as $t) {  if ($t['parentid']==4) {  if ($i>8) { ?>
			<a href="<?php echo $t['url']; ?>"><?php echo $t['catname']; ?></a>
			<?php }  $i++;  }  } } ?>
			<div class="g_clear"></div>
		</div>
		<div class="g_clear"></div>
	</div>
	-->
	<div class="g_clear"></div>
</div>
<script type="text/javascript">
    $(function () {
        $(".sub_trend_menu .links_more").mouseover(function () {
            $(".sub_trend_menu .sub_trend_menu_more").mouseover();
        });
        $(".sub_trend_menu .sub_trend_menu_more").mouseover(function () {
            $(this).show();
        });
        $(".sub_trend_menu .sub_trend_menu_more").mouseout(function () {
            $(this).hide();
        });
    });
</script> 