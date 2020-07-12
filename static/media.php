<?php
$token_endpoint = 'https://tokens.indieauth.com/token';
$base_url = 'https://ascraeus.org/';
$media_url = 'https://media.ascraeus.org';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization');

if(isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'text/plain') !== false) {
  $format = 'text';
} else {
  header('Content-Type: application/json');
  $format = 'json';
}

// Require access token

$headers = array(getallheaders());

  $token = $headers['0']['Authorization'];
  $ch = curl_init("https://tokens.indieauth.com/token");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, Array(
       "Content-Type: application/x-www-form-urlencoded"
      ,"Authorization: $token"
  ));
  $response = Array();
  parse_str(curl_exec($ch), $response);
  curl_close($ch);
  // Check for scope=create
  // Check for me=$configs->siteUrl
  $me = $response['me'];
  $iss = $response['issued_by'];
  $client = $response['client_id'];
  $scope = $response['scope'];
  $scopes = explode(' ', $scope); 
  if(empty($response)){
      header("HTTP/1.1 401 Unauthorized");
      echo 'The request lacks authentication credentials';
      die();
  } elseif ($me != "$base_url") {
      header("HTTP/1.1 401 Unauthorized");
      echo 'The request lacks valid authentication credentials';
      die();
  } elseif (!in_array('create', $scopes) && !in_array('media', $scopes)) {
      header("HTTP/1.1 403 Forbidden");
      echo json_encode([
        'error' => 'insufficient_scope',
        'error_description' => 'The access token provided does not have the necessary scope to upload files'
        ]);
      die();
  }

// Check for a file
if(!array_key_exists('file', $_FILES)) {
  header('HTTP/1.1 400 Bad Request');
  echo json_encode([
    'error' => 'invalid_request',
    'error_description' => 'The request must have a file upload named "file"'
  ]);
  die();
}

$file = $_FILES['file'];

$ext = mime_type_to_ext($file['type']);
if(!$ext) {
  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  if(!$ext)
    $ext = 'txt';
}
$filename = 'file-'.date('YmdHis').'-'.mt_rand(1000,9999).'.'.$ext;

copy($file['tmp_name'], $filename);

$url = $media_url . $filename;
header('HTTP/1.1 201 Created');
header('Location: '.$url);

if($format == 'text') {
  echo $url."\n";
} else {
  echo json_encode([
    'url' => $url
  ]);
}



function mime_type_to_ext($type) {
  $types = [
    'image/jpeg' => 'jpg',
    'image/pjpeg' => 'jpg',
    'image/gif' => 'gif',
    'image/png' => 'png',
    'image/x-png' => 'png',
    'image/svg' => 'svg',
    'audio/x-wav' => 'wav',
    'audio/wave' => 'wav',
    'audio/wav' => 'wav',
    'video/mpeg' => 'mpg',
    'video/quicktime' => 'mov',
    'video/mp4' => 'mp4',
    'audio/x-m4a' => 'm4a',
    'audio/mp3' => 'mp3',
    'audio/mpeg3' => 'mp3',
    'audio/mpeg' => 'mp3',
    'application/json' => 'json',
    'text/json' => 'json',
    'text/html' => 'html',
    'text/plain' => 'txt',
    'application/xml' => 'xml',
    'text/xml' => 'xml',
    'application/x-zip' => 'zip',
    'application/zip' => 'zip',
    'text/csv' => 'csv',
  ];
  if(array_key_exists($type, $types))
    return $types[$type];
  else {
    $fp = fopen('content-types.txt', 'a');
    fwrite($fp, "Unrecognized: $type\n");
    fclose($fp);
    return false;
  }
}