<?php
$is_chrome = preg_match('/(Chrome|CriOS)\//i',$_SERVER['HTTP_USER_AGENT'])
&& !preg_match('/(Aviator|ChromePlus|coc_|Dragon|Edge|Flock|Iron|Kinza|Maxthon|MxNitro|Nichrome|OPR|Perk|Rockmelt|Seznam|Sleipnir|Spark|UBrowser|Vivaldi|WebExplorer|YaBrowser)/i',$_SERVER['HTTP_USER_AGENT']);
?>
<footer class="drop-up">
	<div class="container-fluid">
		<div class="first row green-dark-1">
			<div class="col-md-4 text-left">P 513-521-8462</div>
			<div class="col-md-4 text-center">
				<a class="text-light" href="mailto:info@cincinnatidance.com">info@cincinnatidance.com</a>
			</div>
			<div class="col-md-4 text-right">
				880 Compton Rd
				<br> Cincinnati, OH 45231
			</div>
		</div>
		<div class="second row green-dark-2">
			<div class="<?php echo $is_chrome ? 'col-md-6' : 'col-md-3'; ?> text-left">© Cincinnati Dance &amp; Movement Center</div>
			<?php if(!$is_chrome): ?>
				<div class="col-md-6 text-center">
					<p>
						For best experience, please consider using Chrome.
					</p>
				</div>
			<?php endif; ?>
			<div class="<?php echo $is_chrome ? 'col-md-6' : 'col-md-3'; ?> text-right">
				<a href="https://www.facebook.com/CincinnatiDance/" target="_blank" class="fa fa-facebook"></a>
				<a href="https://twitter.com/CincinnatiDance" target="_blank" class="fa fa-twitter"></a>
				<a href="https://goo.gl/maps/U6B6j4zPzX22" target="_blank" class="fa fa-map-marker"></a>
			</div>
		</div>
	</div>
</footer>