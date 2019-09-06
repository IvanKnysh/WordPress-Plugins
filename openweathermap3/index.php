<?php
/**
 * Plugin Name: Open Weather Map
 * Description: OpenWeatherMap — онлайн сервис, который предоставляет API для доступа к данным о текущей погоде, прогнозам, для web-сервисов и мобильных приложений.
 * Author URI:  https://www.facebook.com/ivan.knysh.7
 * Author:      Ivan Knysh
 * Version:     1.2
 *
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Network:     true
 */

include plugin_dir_path(__FILE__) . 'carbon.php';

$apiKey = get_option('_crb_api_key');
$cityId = get_option('_crb_city_id');
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?id=". $cityId . "&lang=en&units=metric&APPID=". $apiKey;

$json = file_get_contents($apiUrl);
$data = json_decode($json, TRUE);


function owm_shortcode()
{
    global $data;

    ob_start();

    include plugin_dir_path(__FILE__) . 'partials/shortcode-html.php';

    return ob_get_clean();
}
add_shortcode( 'openweathermap', 'owm_shortcode' );