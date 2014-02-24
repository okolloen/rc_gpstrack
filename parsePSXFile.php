<?php
header ("Content-type: application/json");
$t = file_get_contents($_FILES["files"]['tmp_name'][0]);
$dom = simplexml_load_string ($t, 'SimpleXMLElement', LIBXML_NOCDATA);
$data = array();
foreach ($dom->trk as $track) {
	$data[] = array("name" => (string)$track->name, "points"=>array());
	foreach ($track->trkseg->trkpt as $point) {
//		print_r($point);
		$data[count($data)-1]["points"][] = array ("lat"=>(string)$point["lat"], "lon"=>(string)$point["lon"], "ele"=>(string)$point->ele, "time"=>(string)$point->time, "desc"=>(string)$point->desc);
	}
}
echo json_encode ($data);