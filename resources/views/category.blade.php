<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CATEGORY</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- end Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,500,600,700,800,300' rel='stylesheet' type='text/css'>
    <!-- owl carousel SLIDER -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <!-- end awesome icons -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- lightbox -->
    <link href="../css/prettyPhoto.css" rel="stylesheet">

    <!-- Animation Effect CSS -->
    <link rel="stylesheet" href="../css/animation.css">
    <!-- Main Stylesheet CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="../css/settings.css" media="screen" />
    <!-- artist css -->
    <link rel="stylesheet" href="../css/artist-css.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body data-spy="scroll" data-offset="25">
<!--/HEADER SECTION -->

<header class="header">
    <div class="container">
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.html" class="navbar-brand">ATLAS</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" class="int-collapse-menu">Home</a></li>
                        <li><a data-scroll href="#offers" class="int-collapse-menu">Offers</a></li>
                        <li><a data-scroll href="reduction" class="int-collapse-menu">Reduction</a></li>
                        <li><a href="{{route('artists')}}">Artists</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('registration')}}">register</a></li>
                        <li><a data-scroll href="#features" class="int-collapse-menu">Favorites</a></li>
                        <li><a data-scroll href="designers" class="int-collapse-menu">Team</a></li>
                        <li><a data-scroll href="index.php#about" class="int-collapse-menu">about</a></li>
                        <li><a data-scroll href="#features" class="int-collapse-menu"><i class="material-icons">add_shopping_cart</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ARTIST LIST SECTION -->
<section id="works" class="dark-wrapper color-333">
    <div class="container">
        <div class="title text-center">
            <h2>this is ATLAS</h2>
            <h3>Art is here</h3>
        </div>

        <div class="norow">
            <div>

            </div>

            <div class="margin-top-108 masonry_wrapper" data-scroll-reveal="enter from the bottom after 0.5s">
                @foreach ($posts as $post)

                    <div class="item entry item-h2 photography print">
                        <?php $u= $post->artistID; ?>
                        <a href="{{ url('artist/'.$u.' ') }}"> <img src="data:image/png;base64,{{ chunk_split(base64_encode($post->post)) }}" alt="" class="img-responsive"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!--/ FOOTER SECTION-->
<section id="footer" class="footer-wrapper text-center">
    <div class="container">
        <div class="title text-center" data-scroll-reveal="enter from the bottom after 0.5s">
            <div class="aligncenter">
                <a href="index.html" class="navbar-brand">ATLAS</a>
                <p>All rights reserved by Atlas. Any copy of this site
                    It is illegal.</p>
                <p>Designed in 2019</p>
                <a data-scroll-reveal="enter from the bottom after 0.3s" href="#home"><i class="fa fa-angle-up"></i></a>
            </div>    <!-- end title -->
        </div>
    </div><!-- end container -->
</section><!--/ Footer  End -->

<!-- SECTION CLOSED -->

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/smooth-scroll.js"></script>
<script src="../js/jquery.parallax-1.1.3.js"></script>
<script src="../js/jquery.easypiechart.min.js"></script>
<script src="../js/owl.carousel.js"></script>
<script src="../js/jquery.jigowatt.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/jquery.unveilEffects.js"></script>
<script src="../js/jquery.isotope.min.js"></script>

<script type="text/javascript">
	(function ($) {
		var $container = $('.masonry_wrapper'),
			colWidth = function () {
				var w = $container.width(),
					columnNum = 1,
					columnWidth = 0;
				if (w > 1200) {
					columnNum  = 3;
				} else if (w > 900) {
					columnNum  = 3;
				} else if (w > 600) {
					columnNum  = 2;
				} else if (w > 300) {
					columnNum  = 1;
				}
				columnWidth = Math.floor(w/columnNum);
				$container.find('.item').each(function() {
					var $item = $(this),
						multiplier_w = $item.attr('class').match(/item-w(\d)/),
						multiplier_h = $item.attr('class').match(/item-h(\d)/),
						width = multiplier_w ? columnWidth*multiplier_w[1]-4 : columnWidth-4,
						height = multiplier_h ? columnWidth*multiplier_h[1]*0.5-4 : columnWidth*0.5-4;
					$item.css({
						width: width,
						height: height
					});
				});
				return columnWidth;
			}

		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);
		}

		$('nav.portfolio-filter ul li a').on('click', function() {
			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector }, refreshWaypoints());
			$('nav.portfolio-filter ul li a').removeClass('active');
			$(this).addClass('active');
			return false;
		});

		function setPortfolio() {
			setColumns();
			$container.isotope('reLayout');
		}

		isotope = function () {
			$container.isotope({
				resizable: true,
				itemSelector: '.item',
				masonry: {
					columnWidth: colWidth(),
					gutterWidth: 0
				}
			});
		};
		isotope();
		$(window).smartresize(isotope);
	}(jQuery));
	//like post
	$('.like').click(function(){
		$artistId = $(this).attr("artistID");
		$countpost = $(this).attr("postID");
		$.post("{{route('likePost')}}",
			{
				'_token': '{{csrf_token()}}',
				'liked': 1,
				'aID':$artistId,
				'pID':$countpost,

			})
			.done(function() {
				alert( "success" );
			})
			.fail(function() {
				alert( "error" );
			})
	});
	//unlike post
	$('.unlike').click(function(){
		$artistId = $(this).attr("artistID");
		$countpost = $(this).attr("postID");
		$.post("{{route('unlikePost')}}",
			{
				'_token': '{{csrf_token()}}',
				'liked': 0,
				'aID':$artistId,
				'pID':$countpost,

			})
			.done(function() {
				alert( "success" );
			})
			.fail(function() {
				alert( "error" );
			})
	});
</script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="../js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="../js/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript">
	var revapi;
	jQuery(document).ready(function() {
		revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:500,
				hideThumbs:10,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: ""
			});
	});	//ready
</script>

<!-- Animation Scripts-->
<script src="../js/scrollReveal.js"></script>
<script>
	(function($) {
		"use strict"
		window.scrollReveal = new scrollReveal();
	})(jQuery);
</script>

<!-- Portofolio Pretty photo JS -->
<script src="../js/jquery.prettyPhoto.js"></script>
<script type="text/javascript">
	(function($) {
		"use strict";
		jQuery('a[data-gal]').each(function() {
			jQuery(this).attr('rel', jQuery(this).data('gal'));
		});
		jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
	})(jQuery);
</script>

</body>
</html>