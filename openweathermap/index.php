<?php
/**
 * Plugin Name: Open Weather Map
 * Description: OpenWeatherMap — онлайн сервис, который предоставляет API для доступа к данным о текущей погоде, прогнозам, для web-сервисов и мобильных приложений.
 * Author URI:  https://www.facebook.com/ivan.knysh.7
 * Author:      Ivan Knysh
 * Version:     1.0
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Network:     true
 */

include plugin_dir_path(__FILE__) . 'carbon.php';

$apiKey = get_option('_crb_api_key');
$cityId = get_option('_crb_city_id');
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=". $cityId . "&lang=en&units=metric&APPID=". $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();


function owm_shortcode()
{
    global $data;

    ob_start();

    include plugin_dir_path(__FILE__) . 'partials/shortcode-html.php';

    return ob_get_clean();
}
add_shortcode( 'openweathermap', 'owm_shortcode' );