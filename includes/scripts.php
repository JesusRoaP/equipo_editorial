<?php
function js_css_register_equipo_editorial() {
	/* Registro de script. */
	wp_register_script('carrusel-js', esc_url(plugins_url('public/js/carrusel.js', __DIR__)));
	wp_register_script('my-upload', esc_url(plugins_url('admin/js/upload.js', __DIR__)));
	wp_register_script('velocity-js', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.1.0/velocity.min.js');

	wp_register_style('carrusel-css', esc_url(plugins_url('public/css/carrusel.css', __DIR__)));
	wp_register_style('icons-css', esc_url(plugins_url( 'public/css/icons.css', __DIR__)));
	wp_register_style('material-icons', esc_url(plugins_url( 'public/css/material-icons.css', __DIR__)));
	wp_register_style('style-css', esc_url(plugins_url('admin/css/style.css', __DIR__)));
	wp_register_style('font-awesome-5-9-0', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
}
add_action('init', 'js_css_register_equipo_editorial');

function my_shortcode_styles_editorial() {
    global $post;

    if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'equipo_editorial' ) ) {
		wp_enqueue_style( 'carrusel-css' );
		wp_enqueue_style( 'icons-css' );
		wp_enqueue_style( 'material-icons' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_shortcode_styles_editorial' );
?>