<?php
/**
 * Super Construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Super_Construction
 */


//=============================================================
// Credit info of the theme
//=============================================================
function business_point_credit_info(){ ?> 

    <div class="site-info">
        <?php printf( esc_html__( '%1$s by %2$s', 'super-construction' ), 'Super Construction', '<a href="https://promenadethemes.com" rel="designer">Promenade Themes</a>' ); ?>
    </div><!-- .site-info -->
    
    <?php
}

//=============================================================
// Remove upsell link of parent theme and add new link
//=============================================================

function super_construction_customizer( $wp_customize ) {

	class Super_Construction_Info extends WP_Customize_Control {
	    public $type = 'info';
	    public $label = '';
	    public function render_content() {
	    ?>
	        <h2><?php echo esc_html( $this->label ); ?></h2>
	    <?php
	    }
	}

	$wp_customize->remove_section( 'theme_upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Business_Point_Customize_Section_Upsell(
			$wp_customize,
			'child_theme_upsell',
			array(
				'title'    => esc_html__( 'Super Construction Plus', 'super-construction' ),
				'pro_text' => esc_html__( 'Buy Pro', 'super-construction' ),
				'pro_url'  => 'https://promenadethemes.com/downloads/super-construction-plus',
				'priority' => 1,
			)
		)
	);

	// Load options.
	require_once trailingslashit( get_stylesheet_directory() ) . '/includes/customizer/options.php';

}

add_action( 'customize_register', 'super_construction_customizer', 100 );

//=============================================================
// Remove theme info page of parent theme
//=============================================================
function super_construction_remove_parent_info_page() {

    return array();

}

add_filter( 'business_point_about_filter', 'super_construction_remove_parent_info_page');

//=============================================================
// Remove demo page of parent theme
//=============================================================
function super_construction_remove_parent_demo_page() {

    return array();

}

add_filter( 'Business_Point_Demo_filter', 'super_construction_remove_parent_demo_page');

//=============================================================
// Remove demo page of parent theme
//=============================================================

function business_point_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'super-construction' ) ) {
		$fonts[] = 'Open Sans:400,700,900,400italic,700italic,900italic';
	}

	if ( 'off' !== _x( 'on', 'Dosis font: on or off', 'super-construction' ) ) {
		$fonts[] = 'Dosis:300,400,500,600,700';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}