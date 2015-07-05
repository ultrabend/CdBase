<?php
/* MusicBrainz PHP Class for Web Service Version 2
 * Licence: http://musicbrainz.org/doc/Live_Data_Feed
 * API: http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2
 */

class MusicBrainz {

    //Search: http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2/Search
    public function ArtistSearch($artist, $fmt = 'json', $limit = 1) {
        $response = file_get_contents("http://musicbrainz.org/ws/2/artist/?query=artist:".urlencode($artist)."&fmt=$fmt&limit=$limit");
        if ($fmt == 'json') {
            $response = json_decode($response, JSON_FORCE_OBJECT);
        }
        return $response;
    }

    public function ReleaseSearch($release, $fmt = 'json') {
        $responseR = file_get_contents("http://musicbrainz.org/ws/2/release/?query=release:".urlencode($release)."&fmt=$fmt");
        if ($fmt == 'json') {
            $responseR = json_decode($responseR, JSON_FORCE_OBJECT);
        }
        return $responseR;
    }

    public function DiscSearch($discid, $fmt = 'json') {
        $responseD = file_get_contents("http://musicbrainz.org/ws/2/release/".urlencode($discid)."?inc=artists+recordings&fmt=$fmt");
        if ($fmt == 'json') {
            $responseD = json_decode($responseD, JSON_FORCE_OBJECT);
        }
        return $responseD;
    }
    public function BarcodeSearch($barcode, $fmt= 'json'){
        $responseB = file_get_contents("http://musicbrainz.org/ws/2/release?query=barcode:".urlencode($barcode)."&fmt=$fmt");
        if ($fmt == 'json') {
            $responseB = json_decode($responseB, JSON_FORCE_OBJECT);
        }
        return $responseB;
    }
 

}
?>