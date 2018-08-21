<?php
/**
 * uni Theme Customizer
 *
 * @package Uni
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uni_customize_register( $wp_customize ) {
	/**
	 * Adds textarea support to the theme customizer
	 */
	class uni_textarea_control extends WP_Customize_Control {
	    public $type = 'textarea';

	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
	// Logo Controls
	$wp_customize->add_section( 'uni_logo_section' , array(
	    'title'       => __( 'Logo', 'uni' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to display above the site title on each page',
	) );
	$wp_customize->add_setting( 'uni_logo'  , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'uni_sanitize_uri'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'uni_logo', array(
	    'label'    => __( 'Logo', 'uni' ),
	    'section'  => 'uni_logo_section',
	    'settings' => 'uni_logo',
	) ) );
	// Custom Controls
	$wp_customize->add_section(
	    'uni_custom',
	    array(
	        'title'     => 'uni Options',
	        'priority'  => 200
	    )
	);
	// Theme header bg color
	$wp_customize->add_setting( 'uni_header_color' , array(
	    'default'     => '#303538',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'uni_sanitize_color'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'header_color',
	        array(
	            'label'      => __( 'Header Color', 'uni' ),
	            'section'    => 'colors',
	            'settings'   => 'uni_header_color'
	        )
	    )
	);
	// Home head text color
	$wp_customize->add_setting( 'uni_header_textcolor' , array(
	    'default'     => '#50585D',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'uni_sanitize_color'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'uni_header_textcolor',
	        array(
	            'label'      => __( 'Page Header Text Color', 'uni' ),
	            'section'    => 'colors',
	            'settings'   => 'uni_header_textcolor',
	        )
	    )
	);
	// Theme link color
	$wp_customize->add_setting( 'uni_link_color' , array(
	    'default'     => '#4a4a4a',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'uni_sanitize_color'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'link_color',
	        array(
	            'label'      => __( 'Link Color', 'uni' ),
	            'section'    => 'colors',
	            'settings'   => 'uni_link_color'
	        )
	    )
	);
	// Theme hover color
	$wp_customize->add_setting( 'uni_hover_color' , array(
	    'default'     => '#57A3E8',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'uni_sanitize_color'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'hover_color',
	        array(
	            'label'      => __( 'Hover Color', 'uni' ),
	            'section'    => 'colors',
	            'settings'   => 'uni_hover_color'
	        )
	    )
	);
	// Home Menu color
	$wp_customize->add_setting( 'uni_home_menu_color' , array(
	    'default'     => '#ffffff',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'uni_sanitize_color'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'home_menu_color',
	        array(
	            'label'      => __( 'Home Menu Color', 'uni' ),
	            'section'    => 'colors',
	            'settings'   => 'uni_home_menu_color'
	        )
	    )
	);
	// Menu color
	$wp_customize->add_setting( 'uni_menu_color' , array(
	    'default'     => '#50585D',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'uni_sanitize_color'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'menu_color',
	        array(
	            'label'      => __( 'Menu Color', 'uni' ),
	            'section'    => 'colors',
	            'settings'   => 'uni_menu_color'
	        )
	    )
	);

	// Display header bg on all pages (vs home only)
	$wp_customize->add_setting(
	    'uni_display_header',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_display_header',
	    array(
	    	'priority'	=> 1,
	        'section'   => 'uni_custom',
	        'label'     => 'Only display header background on home page',
	        'type'      => 'checkbox'
	    )
	);
	// Display header on all pages (vs home only)
	$wp_customize->add_setting(
	    'uni_display_header_all',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_display_header_all',
	    array(
	    	'priority'	=> 2,
	        'section'   => 'uni_custom',
	        'label'     => 'Only display header on home page',
	        'type'      => 'checkbox'
	    )
	);
	// Circle logo
	$wp_customize->add_setting(
	    'uni_logo_circle',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_logo_circle',
	    array(
	    	'priority'	=> 3,
	        'section'   => 'uni_custom',
	        'label'     => 'Make logo circular',
	        'type'      => 'checkbox'
	    )
	);
	// Frame logo
	$wp_customize->add_setting(
	    'uni_logo_frame',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_logo_frame',
	    array(
	    	'priority'	=> 4,
	        'section'   => 'uni_custom',
	        'label'     => 'Frame logo image',
	        'type'      => 'checkbox'
	    )
	);
	// uni hide page header dot
	$wp_customize->add_setting(
	    'uni_hide_page_header_dot',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_hide_page_header_dot',
	    array(
	    	'priority'	=> 5,
	        'section'   => 'uni_custom',
	        'label'     => 'Hide header \'dot\' on pages',
	        'type'      => 'checkbox'
	    )
	);
	// Automatically limit post summary
	$wp_customize->add_setting(
	    'uni_auto_excerpt',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_auto_excerpt',
	    array(
	    	'priority'	=> 6,
	        'section'   => 'uni_custom',
	        'label'     => 'Auto-limit summary length',
	        'type'      => 'checkbox'
	    )
	);
	// Don't display Categories
	$wp_customize->add_setting(
	    'uni_hide_categories',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_hide_categories',
	    array(
	    	'priority'	=> 7,
	        'section'   => 'uni_custom',
	        'label'     => 'Don\'t display categories',
	        'type'      => 'checkbox'
	    )
	);
	// Don't display Tags
	$wp_customize->add_setting(
	    'uni_hide_tags',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_hide_tags',
	    array(
	    	'priority'	=> 8,
	        'section'   => 'uni_custom',
	        'label'     => 'Don\'t display tags',
	        'type'      => 'checkbox'
	    )
	);
	// Don't display Dates
	$wp_customize->add_setting(
	    'uni_hide_dates',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'uni_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
	    'uni_hide_dates',
	    array(
	    	'priority'	=> 9,
	        'section'   => 'uni_custom',
	        'label'     => 'Don\'t display dates',
	        'type'      => 'checkbox'
	    )
	);
	// Custom meta
	$wp_customize->add_setting( 'uni_custom_meta' , array( 'sanitize_callback' => 'uni_sanitize_meta' ));

	$wp_customize->add_control(
	    new uni_textarea_control(
	        $wp_customize,
	        'uni_custom_meta',
	        array(
	            'label' => 'Custom meta tags',
	            'section' => 'uni_custom',
	            'settings' => 'uni_custom_meta'
	        )
	    )
	);

	// Custom read more link
	$wp_customize->add_setting( 'uni_read_more_link' , array( 'sanitize_callback' => 'uni_sanitize_text' ));

	$wp_customize->add_control(
	    new uni_textarea_control(
	        $wp_customize,
	        'uni_read_more_link',
	        array(
	            'label' => '\'Read More\' link',
	            'section' => 'uni_custom',
	            'settings' => 'uni_read_more_link'
	        )
	    )
	);

	// Custom footer
	$wp_customize->add_setting( 'uni_custom_footer' , array( 'sanitize_callback' => 'uni_sanitize_footer' ));

	$wp_customize->add_control(
	    new uni_textarea_control(
	        $wp_customize,
	        'uni_custom_footer',
	        array(
	            'label' => 'Custom footer',
	            'section' => 'uni_custom',
	            'settings' => 'uni_custom_footer'
	        )
	    )
	);

	/* ==========================================================================
    Social Icons
    ========================================================================== */

	$wp_customize->add_section(
	    'uni_social',
	    array(
	        'title'     => 'Social URLs',
	        'priority'  => 199
	    )
	);
	$wp_customize->add_setting('uni_social_behance', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_behance', array('section' => 'uni_social', 'label' => 'Behance', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_bitbucket', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_bitbucket', array('section' => 'uni_social', 'label' => 'Bitbucket', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_codepen', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_codepen', array('section' => 'uni_social', 'label' => 'CodePen', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_deviantart', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_deviantart', array('section' => 'uni_social', 'label' => 'Deviant Art', 'type' => 'text'));	$wp_customize->add_setting('uni_social_dribbble', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_dribbble', array('section' => 'uni_social', 'label' => 'Dribbble', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_facebook', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_facebook', array('section' => 'uni_social', 'label' => 'Facebook', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_flickr', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_flickr', array('section' => 'uni_social', 'label' => 'Flickr', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_github', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_github', array('section' => 'uni_social', 'label' => 'GitHub', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_google', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_google', array('section' => 'uni_social', 'label' => 'Google+', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_instagram', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_instagram', array('section' => 'uni_social', 'label' => 'Instagram', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_lastfm', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_lastfm', array('section' => 'uni_social', 'label' => 'LastFM', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_linkedin', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_linkedin', array('section' => 'uni_social', 'label' => 'LinkedIn', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_mail', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_email'));
	$wp_customize->add_control('uni_social_mail', array('section' => 'uni_social', 'label' => 'Email', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_rss', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_rss', array('section' => 'uni_social', 'label' => 'RSS', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_soundcloud', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_soundcloud', array('section' => 'uni_social', 'label' => 'SoundCloud', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_stack_overflow', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_stack_overflow', array('section' => 'uni_social', 'label' => 'Stack Overflow', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_spotify', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_spotify', array('section' => 'uni_social', 'label' => 'Spotify', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_tumblr', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_tumblr', array('section' => 'uni_social', 'label' => 'Tumblr', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_twitter', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_twitter', array('section' => 'uni_social', 'label' => 'Twitter', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_website', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_website', array('section' => 'uni_social', 'label' => 'Website', 'type' => 'text'));
	$wp_customize->add_setting('uni_social_youtube', array('transport' => 'refresh', 'sanitize_callback' => 'uni_sanitize_uri'));
	$wp_customize->add_control('uni_social_youtube', array('section' => 'uni_social', 'label' => 'Youtube', 'type' => 'text'));
}
add_action( 'customize_register', 'uni_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function uni_customize_preview_js() {
	wp_enqueue_script( 'uni_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'uni_customize_preview_js' );

/**
 * Sanitize color
 */
function uni_sanitize_color($content){
	$content = str_replace('#', '', $content);
	if (ctype_xdigit($content)) {
	    return '#' . $content;
	}
	return '';
}

/**
 * Sanitize checkbox
 */
function uni_sanitize_checkbox($content){
	if('selected' === $content || 'checked' === $content || 'true' === $content || true === $content){
		return $content;
	}
	return '';
}

/**
 * Sanitize URIs
 */
function uni_sanitize_uri($uri){
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}

/**
 * Sanitize Text
 */
function uni_sanitize_text($str){
	if('' === $str){
		return '';
	}
	return sanitize_text_field( $str);
}

/**
 * Sanitize email/uri
 */
function uni_sanitize_email($uri){
	if('' === $uri){
		return '';
	}
	if (substr( $uri, 0, 4 ) != 'http' && strpos($uri, '@') === false) {
		$uri = 'mailto:' . $uri;
	}
	return sanitize_email($uri);
}

/**
 * Sanitize meta
 */
function uni_sanitize_meta($content){
	$allowed = array('meta' => array());
	if('' === $content){
		return '';
	}
	return wp_kses($content, $allowed);
}

/**
 * Sanitize footer
 */
function uni_sanitize_footer($content){
	if('' === $content){
		return '';
	}
	if ( current_user_can('unfiltered_html') )
		return wp_kses($content, wp_kses_allowed_html('post'));
	else
		return stripslashes( wp_filter_post_kses( addslashes($content) ) );
}
