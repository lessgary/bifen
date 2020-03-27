<?php include $this->_include('header'); ?>
<div class="height10"></div>
<div class="pmain">
	<div class="pmainz">
		<div class="pmainzd">
			<div class="pmainzdt"><span><?php echo $catname; ?></span></div>
			<div class="pmainzdc">
				<?php $return = $this->_listdata("catid=$catid page=$page pagesize=20 order=updatetime"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <li><span><?php echo date("Y-m-d", $t['updatetime']); ?></span> <a href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a></li>
                <?php } } ?>
                
			</div>
			<div class="listpage"><?php echo $pagelist; ?></div>
		</div>
	</div>
	<div class="pmainy">
		<div class="pmainyd">
			<div class="pmainzdt"><span>彩种玩法</span></div>
			<div class="pmainydc">
				<?php $return = $this->_listdata("catid=52 num=10 order=updatetime"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <li><a href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a></li>
                <?php } } ?>
			</div>
		</div>
		
		<div class="pmainyd">
			<div class="pmainzdt"><span>热门帖子</span></div>
			<div class="pmainydc">
				<?php $return = $this->_listdata("catid=$catid num=10 order=updatetime"); extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <li><a href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a></li>
                <?php } } ?>
			</div>
		</div>
	</div>
</div>
<?php include $this->_include('footer'); ?>