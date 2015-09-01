<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {

	public function index()
	{
		set_include_path(get_include_path() . PATH_SEPARATOR . '/opt/lampp/htdocs/app/google-client/src');

		require_once 'google-client/src/Google/autoload.php';

		$client = new Google_Client();
		$client->setApplicationName("manmade");
		$client->setDeveloperKey("AIzaSyDLeITnRUc74O88yUKa5baLq0s0SLwyMxw");

		// Define an object that will be used to make all API requests.
		  $youtube = new Google_Service_YouTube($client);

		  $resultList = array();
		  $htmlBody = '';

		  try {
		    // Call the search.list method to retrieve results matching the specified
		    // query term.
		    $searchResponse = $youtube->search->listSearch('id,snippet', array(
		      'q' => $this->input->get_post('query'),
		      'maxResults' => $this->input->get_post('limit'),
		    ));
		    $videos = '';
		    $channels = '';
		    $playlists = '';
		    // Add each result to the appropriate list, and then display the lists of
		    // matching videos, channels, and playlists.
		    foreach ($searchResponse['items'] as $searchResult) {
		    	switch ($searchResult['id']['kind']) {
			        case 'youtube#video':
			        	$resultList[] = $searchResult['id']['videoId'];
			          	//echo "<br /><pre>"; print_r($searchResult); echo "</pre><br />";
			          break;
			      }
		      
		    }
		  } catch (Google_Service_Exception $e) {
		    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
		      htmlspecialchars($e->getMessage()));
		  } catch (Google_Exception $e) {
		    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
		      htmlspecialchars($e->getMessage()));
		  }

		  echo json_encode($resultList);
		
		//$this->load->view('mothership');
	}

	public function lists(){

		$request = $this->input->post('request');

		switch ($request) {
			case 'latest_playlists':
				$list = array(
					array(
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'A Rocking Psychedelia',
							'link' => 'http://google.co.in',
							'info' => 'A mix of pyschedelic songs that will blow your mind! Check it out!!!'
						),
					array(
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Sir Mix\'a Lot',
							'link' => 'http://google.co.in',
							'info' => 'Grove to the best mix around. Parties, hangouts, whatever... this is the shit.'
						),
					array(
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Dark side of the moon',
							'link' => 'http://google.co.in',
							'info' => 'Everything under the sun is in tune, but the sun is eclipsed by the moon.'
						),
					array(
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Monkeys and Killers',
							'link' => 'http://google.co.in',
							'info' => 'Arctic Monkeys + The Killers + similar artists = best mix ever :D'
						),
					array(
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Let it be',
							'link' => 'http://google.co.in',
							'info' => 'Just listen to it. No reason required.'
						),
					array(
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'The End',
							'link' => 'http://google.co.in',
							'info' => 'This is the end, beautiful friend.'
						)
				);

				$list['results'] = count($list);

				break;
			
			default:
				$list = array();
				$list['results'] = count($list);

				break;
		}

		print_r(json_encode($list));	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */