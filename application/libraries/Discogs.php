<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Discogs {

	    public function discogs_release_search($release,$artist) {
	        $url = "https://api.discogs.com/database/search?type=release&q=".urlencode($release).'&artist='.urlencode($artist).'&format=cd'.'&key=JCaXzEPMksRxRlVttxdf&secret=BVGDqlCfdDXtpbPwoIKOqfQtoXDWvGau';
	        if ($release) {
	          $ch = curl_init();
	          curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase/0.4 +http//ultrabend.org');	          
	          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	          curl_setopt($ch, CURLOPT_URL, $url);
	          $response = curl_exec ($ch);
	          curl_close($ch);
	          $response = json_decode($response, JSON_FORCE_OBJECT);
	          print_r(error_get_last());
	        }
	        return $response;
	    }
	    
	   	public function discogs_release_import($id) {
	        $url = "https://api.discogs.com/releases/".urlencode($id);
	        if ($id) {
	          $ch = curl_init();
	          curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase/0.4 +http//ultrabend.org');	          
	          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	          curl_setopt($ch, CURLOPT_URL, $url);
	          $response = curl_exec ($ch);
	          curl_close($ch);
	          $response = json_decode($response, JSON_FORCE_OBJECT);
	          print_r(error_get_last());
	        }
	        return $response;
	    }

	   	public function discogs_artist_import($id) {
	        $url = "https://api.discogs.com/artists/".urlencode($id);
	        if ($id) {
	          $ch = curl_init();
	          curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase/0.4 +http//ultrabend.org');	          
	          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	          curl_setopt($ch, CURLOPT_URL, $url);
	          $response = curl_exec ($ch);
	          curl_close($ch);
	          $response = json_decode($response, JSON_FORCE_OBJECT);
	          print_r(error_get_last());
	        }
	        return $response;
	    }

	}
 	?>