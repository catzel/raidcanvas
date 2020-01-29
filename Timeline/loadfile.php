<?php
$guid = $_POST['guid'];
$docRoot = $_SERVER['DOCUMENT_ROOT'];

if (empty($guid)) {
  die(json_encode(array('success' => false, 'message' => "No ID was provided: $guid")));
} else {
  $filename = "$docRoot/savedata/$guid.json";

  if (file_exists($filename)) {
    $string = file_get_contents($filename);
    $parseError = false;
    if (empty($string)) {
      $parseError = true;
    } else {
      $json = json_decode($string);
      if ($json && $string != $json) {
        echo $string;
      } else {
        $parseError = true;
      }
    }

    if ($parseError) {
      die(json_encode(array('success' => false, 'message' => "File is empty or invalid.")));
    }
  } else {
    die(json_encode(array('success' => false, 'message' => "No file exists with ID $guid.")));
  }
}
?>
