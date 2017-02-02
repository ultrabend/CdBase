<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Musicbrainz {

	    /*public function ArtistSearch($artist, $fmt = 'json', $limit = 1) {
	        $response = file_get_contents("http://musicbrainz.org/ws/2/artist/?query=artist:".urlencode($artist)."&fmt=$fmt&limit=$limit");
	        if ($fmt == 'json') {
	            $response = json_decode($response, JSON_FORCE_OBJECT);
	        }
	        return $response;
	    }*/

	    public function release_search($release,$artist,$fmt = 'json') {
	        $url = 'http://musicbrainz.org/ws/2/release/?query=release:'.urlencode($release).'%20AND%20artist:'.urlencode($artist).'&fmt='.$fmt;
	        if ($fmt == 'json') {
	          $ch = curl_init();
	          curl_setopt($ch, CURLOPT_URL, $url);
	          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	          //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
	          curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase');
	          $response = curl_exec ($ch);
	          curl_close($ch);
	          $response = json_decode($response, JSON_FORCE_OBJECT);
	          print_r(error_get_last());
	        }
	        return $response;
	    }

	    public function DiscSearch($discid, $fmt = 'json') {
	    	$url = "http://musicbrainz.org/ws/2/release/".urlencode($discid)."?inc=recordings&fmt=$fmt";

	        if ($fmt == 'json') {
	          $ch = curl_init();
	          curl_setopt($ch, CURLOPT_URL, $url);
	          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	          curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase');
	          $response = curl_exec ($ch);
	          curl_close($ch);
	          $response = json_decode($response, JSON_FORCE_OBJECT);
	          print_r(error_get_last());
	        }
	        return $response;
	    }

	    public function BarcodeSearch($barcode, $fmt= 'json'){
	        $url = "http://musicbrainz.org/ws/2/release?query=barcode:".urlencode($barcode)."&fmt=$fmt";

	        if ($fmt == 'json') {
	          $ch = curl_init();
	          curl_setopt($ch, CURLOPT_URL, $url);
	          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	          curl_setopt($ch, CURLOPT_USERAGENT, 'CdBase');
	          $response = curl_exec ($ch);
	          curl_close($ch);
	          $response = json_decode($response, JSON_FORCE_OBJECT);
	          print_r(error_get_last());
	        }
	        return $response;
	    }
	    
	}
 	?>