<?php
/**
 * Plugin Name: My Weather Plugin
 * Description: Displays current weather using OpenWeatherMap API.
 * Version: 1.0
 * Author: Your Name
 */

// Enqueue JS
add_action('wp_enqueue_scripts', 'weather_search_enqueue_scripts');
function weather_search_enqueue_scripts() {
    wp_enqueue_script('weather-search-js', plugin_dir_url(__FILE__) . 'weather.js', ['jquery'], null, true);
    wp_localize_script('weather-search-js', 'weather_ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('weather_nonce'),
    ]);
}

// //Enqueue CSS
add_action('wp_enqueue_scripts', 'weather_search_enqueue_stylesheet');
function weather_search_enqueue_stylesheet() {
    wp_enqueue_style('weather-search-css', plugin_dir_url(__FILE__) . 'weather.css',[],null);

}

// AJAX handler for both logged-in and guest users
add_action('wp_ajax_get_weather_data', 'handle_weather_search');
add_action('wp_ajax_nopriv_get_weather_data', 'handle_weather_search');

function handle_weather_search() {
    check_ajax_referer('weather_nonce', 'nonce');

    $city = sanitize_text_field($_POST['city']);
    $api_key = '685b075285b1444ddd27d163239e6950'; // 🔁 Replace with your OpenWeatherMap API key
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$api_key}&units=metric";

    $response = wp_remote_get($url);
    if (is_wp_error($response)) {
        wp_send_json_error('❌ API request failed.');
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (!isset($data['main']['temp'])) {
        wp_send_json_error('⚠️ City not found.');
    }

    $result = [
        'city' => $data['name'],
        'temp' => $data['main']['temp'],
        'desc' => $data['weather'][0]['description']
    ];

    wp_send_json_success($result);
}

// Shortcode to display the search form and result area
add_shortcode('weather_search_box', function () {
    ob_start(); ?>
    <div id="weather-search">
        <input type="text" id="weather-city" placeholder="Enter city name" />
        <button id="get-weather">Search</button>
        <div id="weather-result"></div>
    </div>
    <?php return ob_get_clean();
});

