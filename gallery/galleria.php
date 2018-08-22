<?php
set_include_path('../');
$page = $_GET['title'];
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include_once 'includes/head.php'; ?>
		<link rel="stylesheet" href='css/style.css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css">

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	</head>
	<body>
		<?php include_once 'includes/menu.php'; ?>

		<div class="drop-up">
			<div class="container-fluid body-container">
				<div class="body-inner">

					<div class="wrapper">

						<div class="gallery-content cf">

							<a href="gallery/" class="btn btn-secondary" style="color:white; float:right">Back</a>
							<h1><?php echo $page; ?></h1>

							<div class="picture l3 cf" itemscope itemtype="http://schema.org/ImageGallery">
								<?php
								$i = 0;
								$pattern = $_GET['form'];
								$file = $_GET['file'];
								$position = 0;
								$box = 1;
								$boxCount = 1;

								for ($i=0; $i < 20; $i++):
								$current = 'img/gallery/' . $file . '/' . $i . '.jpg';
								$size = getimagesize('../' . $current);
								$size = $size[0] . "x" . $size[1];
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
									<a href='<?php echo $current; ?>' itemprop="contentUrl" data-size='<?php echo $size; ?>'>
										<img src='<?php echo $current; ?>' itemprop="thumbnail"  alt="Image description" />
									</a>
									<!--figcaption itemprop="caption description">Image caption  1</figcaption -->

								</figure>
								<?php 
								$boxCount ++;
								endfor; ?>
							</div>
						</div>
					</div>
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
		<?php include_once 'includes/footer.php'; ?>

		<?php include_once 'includes/javascript.php'; ?>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js"
				crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js"
				crossorigin="anonymous"></script>
		<script src="js/script-min.js"></script>
	</body>
</html>