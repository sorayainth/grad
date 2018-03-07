<?php
/**
 * Home widgets
 *
 * @package Business_Point
 */

// Bail if not home page.
if ( ! is_page_template( 'templates/home.php' )  ) {
	return;
}
?>

<div id="home-page-widget-area" class="widget-area">
	
		<?php if ( is_active_sidebar( 'home-page-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'home-page-widget-area' ); ?>
		<?php else: ?>
			<?php
			// CTA.
			$args = array(
				'title'       => esc_html__( 'This is Business Point', 'business-point' ),
				'filter'      => true,
				'button_url'  => '#',
				'button_text' => esc_html__( 'Learn More', 'business-point' ),
				'text'        => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolor possimus inventore ut sint et, blanditiis nobis tempore voluptatum, autem in. Provident fugiat sunt placeat quibusdam dolore, quasi repudiandae eius.', 'business-point' ),
			);
			if ( current_user_can( 'edit_theme_options' ) ) {
				$args['button_url']  = esc_url( admin_url( 'widgets.php' ) );
				$args['button_text'] = esc_html__( 'Add Widgets', 'business-point' );
				$args['text']        = esc_html__( 'Widgets of Home Page Widget Area will be displayed here. Go to Appearance->Widgets in admin panel to add widgets. All these widgets will be replaced when you start adding widgets.', 'business-point' );
			}

			$widget_args = array(
				'before_title' => '<h2 class="widget-title">',
				'after_title'  => '</h2>',
			);
			the_widget( 'Business_Point_CTA_Widget', $args, $widget_args );
			?>
		<?php endif; ?>
	
</div><!-- #home-page-widget-area -->

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d955.1735040338718!2d100.19166602660079!3d16.74211238846825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30dfbea2b8305c89%3A0x29b0f7776a73ea7a!2z4Lia4Lix4LiT4LiR4Li04LiV4Lin4Li04LiX4Lii4Liy4Lil4Lix4LiiIOC4oeC4q-C4suC4p-C4tOC4l-C4ouC4suC4peC4seC4ouC4meC5gOC4o-C4qOC4p-C4ow!5e0!3m2!1sth!2sth!4v1517054383811" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
