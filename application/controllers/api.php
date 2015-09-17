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
							'id' => 'abc123def456',
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'A Rocking Psychedelia',
							'link' => 'http://google.co.in',
							'link_text' => 'Stoneman',
							'info' => 'A mix of pyschedelic songs that will blow your mind! Check it out!!!'
						),
					array(
							'id' => 'cba321fed654',
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Sir Mix\'a Lot',
							'link' => 'http://google.co.in',
							'link_text' => 'boozie',
							'info' => 'Grove to the best mix around. Parties, hangouts, whatever... this is the shit.'
						),
					array(
							'id' => 'def123ghi456',
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Dark side of the moon',
							'link' => 'http://google.co.in',
							'link_text' => 'Kill-Bill',
							'info' => 'Everything under the sun is in tune, but the sun is eclipsed by the moon.'
						),
					array(
							'id' => 'fed321igh654',
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Monkeys and Killers',
							'link' => 'http://google.co.in',
							'link_text' => 'Recca',
							'info' => 'Arctic Monkeys + The Killers + similar artists = best mix ever :D'
						),
					array(
							'id' => 'ghi123jkl456',
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'Let it be',
							'link' => 'http://google.co.in',
							'link_text' => 'Fujin',
							'info' => 'Just listen to it. No reason required.'
						),
					array(
							'id' => 'ihg321lkj654',
							'cover' => 'http://lorempixel.com/g/400/200',
							'title' => 'The End',
							'link' => 'http://google.co.in',
							'link_text' => 'Stoneman',
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

	public function tagList(){

		$tagArr = array(
			array('id'=>'rock', 'tag'=>'Rock'),
			array('id'=>'pop', 'tag'=>'Pop'),
			array('id'=>'jazz', 'tag'=>'Jazz'),
			array('id'=>'blues', 'tag'=>'Blues'),
			array('id'=>'hiphop', 'tag'=>'Hiphop'),
			array('id'=>'edm', 'tag'=>'EDM'),
			array('id'=>'dance', 'tag'=>'Dance'),
			array('id'=>'90\'s', 'tag'=>'90\'s'),
			array('id'=>'rap', 'tag'=>'Rap')
		);


		echo json_encode($tagArr);
	}

	public function tagSearch(){
		$tagTrigger = $this->input->post('tagTrigger');
		$found = false;
		$matches = array();

		$tagArr = array(
			array('id'=>'rock', 'tag'=>'Rock'),
			array('id'=>'pop', 'tag'=>'Pop'),
			array('id'=>'jazz', 'tag'=>'Jazz'),
			array('id'=>'blues', 'tag'=>'Blues'),
			array('id'=>'hiphop', 'tag'=>'Hiphop'),
			array('id'=>'edm', 'tag'=>'EDM'),
			array('id'=>'dance', 'tag'=>'Dance'),
			array('id'=>'90\'s', 'tag'=>'90\'s'),
			array('id'=>'rap', 'tag'=>'Rap')
		);

		$tagTrigger = strtolower($tagTrigger);
		$tagLength = strlen($tagTrigger);
		foreach ($tagArr as $id => $tag) {
			if(substr($tag['id'], 0, $tagLength)===$tagTrigger){
				$matches[] = array('id'=>$tag['id'],'tag'=>$tag['tag']);
				$found = true;
			}
		}
		if($found){
			echo json_encode($matches);
		}else{
			echo 0;
		}
		}

		public function uploadCover(){
			// You need to add server side validation and better error handling here

			$data = array();
			if(isset($_FILES))
			{  
			    $error = false;
			    $files = array();

			    $uploaddir = '/opt/lampp/htdocs/playawesome/uploads/';
			    foreach($_FILES as $file)
			    {
			    	$fileNameArr = explode('.', $file['name']);
			    	$c = count($fileNameArr);
			    	$fileType = $fileNameArr[$c-1];
			    	$coverName = mt_rand(1,99).time().mt_rand(1,99).".".$fileType;

			        if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($coverName)))
			        {
			            $files[] = $coverName;
			        }
			        else
			        {
			            $error = true;
			        }
			    }
			    $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
			}
			else
			{
			    $data = array('success' => 'Form was submitted', 'formData' => $_POST);
			}

			echo json_encode($data);
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */