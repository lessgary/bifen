<?php include $this->_include('header'); ?>
<div class="height10"></div>
<div class="pmain">
	<div class="pmainz">
		<div class="pmainzd2">
			<div class="pmainzd2t">您当前位置：<a  href="<?php echo SITE_PATH; ?>">首页</a> >> <?php echo catpos($catid, ' &gt;&gt;&nbsp;&nbsp;'); ?></div>
			<div class="pmainzd2c">
				<div class="pmainzd2ct">
					<h1><?php echo $title; ?></h1>
				</div>
				<div class="pmainzd2cc">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="pmainy">
		<div class="pmainyd">
			<div class="pmainzdt"><span>彩种玩法</span></div>
			<div class="pmainydc">
				<?php $return = $this->_listdata("catid=52 num=1 order=updatetime"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <li><a href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a></li>
                <?php } } ?>
			</div>
		</div>
		
		<div class="pmainyd">
			<div class="pmainzdt"><span>热门帖子</span></div>
			<div class="pmainydc">
				<?php $return = $this->_listdata("catid=$catid num=10 order=updatetime"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  } } ?>
			</div>
		</div>
	</div>
</div>
<?php include $this->_include('footer'); ?>