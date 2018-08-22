<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1">
		<title>Using PhotoSwipe with jQuery</title>

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css">

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	</head>
	<body>

		<div class="wrapper">

			<div class="demo-content cf">

				<div class="picture l3 cf" itemscope itemtype="http://schema.org/ImageGallery">
					<?php
					$i = 0;
					$pattern = $_GET['form'];
					$pattern = "1232132321";
					$position = 0;
					$box = 1;
					$boxCount = 1;

					for ($i=0; $i < 20; $i++):
					$current = "img/gallery/caribole18-07-20/" . $i . ".jpg";
					$width = getimagesize($current)[0];
					$height = getimagesize($current)[1];
					$size = $width . "x" . $height;
					if ($boxCount == $box): 
					$newBox = $pattern[$position];
					$position++;
					$newClass = "picture l" . $newBox . " cf";
					?>
				</div>
				<div class="<?php echo $newClass; ?>" itemscope itemtype="http://schema.org/ImageGallery">
					<?php 
					$box = $newBox;
					$boxCount = 0;
					endif; ?>

					<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						<a href="<?php echo $current; ?>" itemprop="contentUrl" data-size='<?php echo $size; ?>'>
							<img src="<?php echo $current; ?>" itemprop="thumbnail"  alt="Image description" />
						</a>
						<!--figcaption itemprop="caption description">Image caption  1</figcaption -->

					</figure>
					<?php 
					$boxCount ++;
					endfor; ?>
				</div>
			</div>
		</div>

		<!-- Root element of PhotoSwipe. Must have class pswp. -->
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

			<div class="pswp__bg"></div>
			<div class="pswp__scroll-wrap">

				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>

				<div class="pswp__ui pswp__ui--hidden">

					<div class="pswp__top-bar">

						<div class="pswp__counter"></div>

						<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
						<button class="pswp__button pswp__button--share" title="Share"></button>
						<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
						<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

						<div class="pswp__preloader">
							<div class="pswp__preloader__icn">
								<div class="pswp__preloader__cut">
									<div class="pswp__preloader__donut"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
						<div class="pswp__share-tooltip"></div> 
					</div>

					<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
					</button>

					<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
					</button>

					<div class="pswp__caption">
						<div class="pswp__caption__center"></div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js"
				crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js"
				crossorigin="anonymous"></script>
		<script src="js/script-min.js"></script>
	</body>
</html>