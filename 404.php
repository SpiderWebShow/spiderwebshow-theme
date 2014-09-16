<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

	<div class="main_content vertical_home pure-g-r">

		<div class="pure-u-2-3 fourohfour">

			<header class="page-header">
				<h1 class="page-title">Page Not Found</h1>
			</header>
		

					<img src="<?php bloginfo('template_url'); ?>/img/broken.png" alt="A frownie face"/>
					<h2>This is somewhat embarassing - the page you were looking for cannot be found.</h2>
					<h3><a href="/">Click here to return to the SpiderWebShow Home</a></h3>
		</div>
		
	</div> <!-- .main_content -->

<?php get_footer(); ?>