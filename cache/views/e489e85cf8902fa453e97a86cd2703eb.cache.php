		<div class="hklistnfen">
		<li><a href="./index.php?c=content&a=list&catid=17">2016</a></li>
		<?php if (is_array($cats)) { $count=count($cats);foreach ($cats as $c) {  if ($c['parentid']==17) { ?>
		<li><a href="<?php echo $c['url']; ?>"><?php echo $c['catname']; ?></a></li>
		<?php }  } } ?>
		</div>
		<script>
		$("#hk6kjlsmore").click(function(){
			$(".hklistnfen").toggle();
		});
		</script>