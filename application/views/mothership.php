<?
	set_include_path(get_include_path() . PATH_SEPARATOR . '/path/to/google-api-php-client/src');

	$client = new Google_Client();
	$client->setApplicationName("manmade");
	$client->setDeveloperKey("AIzaSyDLeITnRUc74O88yUKa5baLq0s0SLwyMxw");

	$service = new Google_Service_Books($client);

	$optParams = array('filter' => 'free-ebooks');
	$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

	foreach ($results as $item) {
	  echo $item['volumeInfo']['title'], "<br /> \n";
	}

?>