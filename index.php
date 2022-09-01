<?php
/*
Plugin Name: Mon premier plugin
Plugin URI: https://mon-meteo.com/
Description: plugin meteo
Author: gamouh mehdi
Version: 1.0
Author URI: http://mon-meteo.com/
*/

function api()
{
    $api_url = 'https://api.openweathermap.org/data/2.5/weather?q=nantes&units=metric&lang=fr&appid=92c3fd34ea87fe572aaad5a6f99029fb';

    // Read JSON file
    $json_data = file_get_contents($api_url);

    // Decode JSON data into PHP array
    $response_data = json_decode($json_data);
    // var_dump($response_data);
    // All user data exists in 'data' object
    return $response_data;
}



function display()
{
    $response_data = api();
    printf('<img src ="http://openweathermap.org/img/w/01d.png">' .
        $response_data->name . " " . $response_data->weather[0]->description . " "  . $response_data->main->temp_min . " ");
};

add_action('admin_notices', 'display');
