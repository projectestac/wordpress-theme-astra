<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$astra_sidebar = apply_filters( 'astra_get_sidebar', 'sidebar-1' );

echo '<div ';
	echo astra_attr(
		'sidebar',
		array(
			'id'    => 'secondary',
			'class' => join( ' ', astra_get_secondary_class() ),
		)
	);
	echo '>';

	echo astra_get_breadcrumb();
	?>

	<div class="sidebar-main" <?php /** @psalm-suppress TooManyArguments */ echo apply_filters( 'astra_sidebar_data_attrs', '', $astra_sidebar ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, Generic.Commenting.DocComment.MissingShort ?>>
		<?php astra_sidebars_before(); ?>

		<?php

		if ( is_active_sidebar( $astra_sidebar ) ) :
				dynamic_sidebar( $astra_sidebar );
		endif;

		astra_sidebars_after();
		?>

		<!-- Display the table of links to the pages -->

			<ul class="accordion">
				<?php
				$pages = get_pages();

				foreach ($pages as $page) {
					if ($page->post_parent === 0) {
						echo '<li>';
						if (count(get_pages(array('child_of' => $page->ID))) > 0) {
							echo '<a href="#" class="accordion-toggle">' . $page->post_title . ' <i class="fa-solid fa-angle-down"></i></a>';
							echo '<ul class="submenu">';
							$args = array(
								'post_type' => 'page',
								'post_status' => 'publish',
								'post_parent' => $page->ID
							);
							$child_pages = get_posts($args);
							foreach ($child_pages as $child_page) {
								echo '<li><a href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a></li>';
							}
							echo '</ul>';
						} else {
							echo '<a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>';
						}
						echo '</li>';
					}
				}
				?>
			</ul>

			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

			<script>
				$(document).ready(function() {

					$('.accordion-toggle').click(function(e) {
						e.preventDefault();
						$(this).parent().siblings().find('> .submenu').slideUp();
						$(this).parent().siblings().find('> .accordion-toggle').removeClass('active');
						$(this).toggleClass('active').next('.submenu').slideToggle();

						// Change arrow direction
						$(this).find('i').toggleClass('fa-angle-down fa-angle-up');
					});

					// Close submenus by default
					$('.submenu').hide();

					// Add the "current-menu-item" class to the link of the current page
					$('ul.accordion a').each(function(){
						if ($(this).attr('href') === window.location.href) {
							$(this).closest('.submenu').show();
							$(this).parent().addClass('current-menu-item');
							console.log($(this).closest('.submenu').prev());
							$(this).closest('.submenu').prev().find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
						}
					});
				});
			</script>

		<style>
			/* CSS styles for the accordion menu */
			.accordion {
				list-style-type: none;
				padding: 0;
				margin: 0;
				font-family: sans-serif;
			}
			
			.accordion li {
				/* margin-bottom: 10px; */
				color: #444;
				border-bottom: 1px solid #DBDBDB;
			}

			.accordion li ul li {
				/* margin-bottom: 10px; */
				border-bottom: 1px solid #ededed;
			}
		
			.accordion li a {
				display: block;
				color: #1EA19B;
				text-decoration: none;
				padding: 15px;
				/* background-color: #ddd; */
				/* border-radius: 5px; */
				position: relative;
			
				font-weight: 500;
			}

			/* .accordion li a:last-of-type {
				border-bottom: 0px solid #DBDBDB;
			} */
			
			.accordion li a.active {
				background-color: #f4f4f4;
			}
			
			.accordion li a .angle {
				
				position: absolute;
				top: 50%;
				right: 10px;
				transform: translateY(-50%) rotate(180deg);
				width: 15px;
				height: 15px;
				/* border-top: 5px solid transparent;
				border-bottom: 5px solid transparent;
				border-left: 5px solid #000; */
			}
			
			.accordion li a.active .angle {
				transform: translateY(-50%) rotate(0deg);
			}
			
			.accordion li ul {
				list-style-type: none;
				padding: 0;
				margin: 0;
				display: none;
			}
			
			.accordion li ul li a {
				padding-left: 20px;
				/* background-color: #eee; */
				font-weight: 300;
				color: #444;
			}

			.accordion li ul li ul li a {
				padding-left: 40px;
				color: gray;
				font-size: 90%;
				/* background-color: #eee; */
			}

			.accordion li:last-of-type {
				border-bottom: 0px solid #DBDBDB;
			}
			
			div.widget-area {
				margin-top: 25px !important;
			}

			div.sidebar-main {
				background-color: #f4f4f4;
				padding: 10px;
				border-radius: 25px;
			}

			div.sidebar-main li {
				list-style-type: none;
				margin: 0;
				padding: 5px;
				cursor: pointer;
			}

			div.sidebar-main li.current-menu-item {
				background-color: #e7e7e7;
				border-right: 3px solid #1EA19B;
			}

			div.sidebar-main ul.accordion {
				margin: 0;
				padding: 0;
			}

			div.sidebar-main li:hover {
				background-color: #ededed;
			}

			div.sidebar-main a:hover {
				text-decoration: underline;
			}

			/* Breadcrumb styles */
			span[itemprop="name"] {
				color: #1EA19B;
				text-transform: uppercase;
			}

			.trail-items li::after {
				padding: 0 0.3em;
				content: "\/";
			}
		</style>

	</div><!-- .sidebar-main -->
</div><!-- #secondary -->
