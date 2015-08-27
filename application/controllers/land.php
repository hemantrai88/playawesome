<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Land extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */