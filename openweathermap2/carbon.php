<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'openweathermap_theme_options' );
function openweathermap_theme_options() {
    Container::make( 'theme_options', __( 'Open Weather Map' ) )
        ->set_page_menu_title( 'OWP' )
        ->set_icon( 'dashicons-admin-site-alt3' )
        ->add_fields( array(
            Field::make( 'text', 'crb_api_key', __( 'API KEY' ) ),
            Field::make( 'text', 'crb_city_id', __( 'City Id' ) ),
            Field::make( 'radio', 'crb_city_show', __( 'Show city' ) )
                ->set_options( array(
                    1 => 'yes',
                    0 => 'no',
                ) ),
            Field::make( 'radio', 'crb_weather_icon_show', __( 'Show weather icon' ) )
                ->set_options( array(
                    1 => 'yes',
                    0 => 'no',
                ) ),
            Field::make( 'html', 'crb_information_text' )
                ->set_html( '<h1>Shortcode</h1><p>[openweathermap]</p>' )
        ) );
}

add_action( 'after_setup_theme', 'crb_load_openweathermap' );
function crb_load_openweathermap() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}