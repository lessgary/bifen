	<div class="height20"></div>
	<div class="footer">
		<!--div class="footer1">友情链接：
<?php $return = $this->_listdata("table=link.link order=listorder_asc cache=0"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
<a href="<?php echo $t['url']; ?>" target="_blank" title="<?php echo $t['introduce']; ?>"><?php echo $t['name']; ?></a>&nbsp;&nbsp;&nbsp;
<?php } } ?>
		</div-->
		<div class="footer2">
			<p>Copyright © 2000-<?php echo date("Y")?> 33133开奖网  All rights reserved.  <img src="<?php echo SITE_THEME; ?>images/ft1.jpg" /> 彩票有风险，购买要适度。禁止18周岁以下未成年人购买彩票。
			
			</p>
			<h4><img src="<?php echo SITE_THEME; ?>images/fl1.jpg" /><img src="<?php echo SITE_THEME; ?>images/fl2.jpg" /><img src="<?php echo SITE_THEME; ?>images/fl3.jpg" /><img src="<?php echo SITE_THEME; ?>images/fl4.jpg" /><img src="<?php echo SITE_THEME; ?>images/fl5.jpg" /></h4>
			<script language="javascript" src="http://count17.51yes.com/click.aspx?id=171275296&logo=12" charset="gb2312"></script>
		</div>
	</div>
</div>
<script src="<?php echo SITE_PATH; ?>media/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo SITE_PATH; ?>media/ring.js" type="text/javascript"></script>
</body>
<?php if ($cats[$catid]['parentid'] != 0) {  $catid_tm = $cats[$catid]['parentid'];  } else {  $catid_tm = $catid;  }  if (!$indexc) { ?>
<script>
var idx = '<?php echo str_replace("content_1_","",$cats[$catid_tm]["tablename"]); ?>';
var change_time = configs[idx]['change_time'];
var id = configs[idx]['id'];
var catid = '<?php echo $catid_tm; ?>';
var modelid = '<?php echo $cats[$catid_tm]["modelid"]; ?>';
var last_time = 0;
</script>
<?php $return = $this->_listdata("catid=$catid_tm num=1 order=id more=1"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  if ($key == 0) { ?>
<script type="text/javascript">
    var last_time = "<?php echo $t['updatetime']; ?>";
</script>
<?php }  } }  } ?>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/base.js"></script>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/main.js"></script>
<?php if ($indexc) { ?>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/hotOpen.js"></script>
<?php }  if ($parentid==0  &&  $indexc!=1 || $parentid==4) { ?>
<script type="text/javascript" src="<?php echo SITE_THEME; ?>js/1000.js?v=1231123121231111"></script>
<?php } ?>
</html>