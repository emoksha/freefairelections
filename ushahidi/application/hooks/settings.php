<?php defined('SYSPATH') or die('No direct script access.');

/**
* Default Settings From Database
*/

$settings = ORM::factory('settings', 1);

// Set Site Language
Kohana::config_set('locale.language', $settings->site_language);

// Main Site Settings
Kohana::config_set('settings.site_name', $settings->site_name);
Kohana::config_set('settings.site_tagline', $settings->site_tagline);
Kohana::config_set('settings.allow_feed', $settings->allow_feed);
Kohana::config_set('settings.allow_clustering', $settings->allow_clustering);
Kohana::config_set('settings.sms_no1', $settings->sms_no1);
Kohana::config_set('settings.sms_no2', $settings->sms_no2);
Kohana::config_set('settings.sms_no3', $settings->sms_no3);
Kohana::config_set('settings.default_map', $settings->default_map);
Kohana::config_set('settings.api_google', $settings->api_google);
Kohana::config_set('settings.api_yahoo', $settings->api_yahoo);
Kohana::config_set('settings.default_city', $settings->default_city);
Kohana::config_set('settings.default_country', $settings->default_country);
Kohana::config_set('settings.default_lat', $settings->default_lat);
Kohana::config_set('settings.default_lon', $settings->default_lon);
Kohana::config_set('settings.default_zoom', $settings->default_zoom);
Kohana::config_set('settings.items_per_page', $settings->items_per_page);
Kohana::config_set('settings.items_per_page_admin', $settings->items_per_page_admin);
Kohana::config_set('settings.google_analytics', $settings->google_analytics);

$default_map = $settings->default_map;
$api_google = $settings->api_google;
$api_yahoo = $settings->api_yahoo;

if ($default_map == 2) {		// Virtual Earth / Live
	Kohana::config_set('settings.api_url', '<script src="http://dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6"></script>');
}
elseif ($default_map == 3) {	// Yahoo
	Kohana::config_set('settings.api_url', '<script type="text/javascript" src="http://api.maps.yahoo.com/ajaxymap?v=3.0&appid=' . $api_yahoo . '"></script>');
}
elseif ($default_map == 4) {	// Open Streetmaps
	Kohana::config_set('settings.api_url', '<script src="http://openstreetmap.org/openlayers/OpenStreetMap.js"></script>');
}
else {							// Google
	Kohana::config_set('settings.api_url', '<script src="http://maps.google.com/maps?file=api&v=2&key=' . $api_google . '" type="text/javascript"></script>');
}

// And in case you want to display all maps on one page...
Kohana::config_set('settings.api_url_all', '<script src="http://dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6"></script><script type="text/javascript" src="http://api.maps.yahoo.com/ajaxymap?v=3.0&appid=' . $api_yahoo . '"></script><script src="http://maps.google.com/maps?file=api&v=2&key=' . $api_google . '" type="text/javascript"></script><script src="http://openstreetmap.org/openlayers/OpenStreetMap.js"></script>');