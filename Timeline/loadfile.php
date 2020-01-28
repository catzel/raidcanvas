<?php
$guid = $_POST['guid'];

if (empty($guid)) {
  echo json_encode(array('success' => false, 'message' => "No ID was provided."));
  trigger_error("No ID was provided.", E_ERROR);
}

$filename = "/Repository/$guid.json";

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
    echo json_encode(array('success' => false, 'message' => "File is empty or invalid."));
    trigger_error("File is empty or invalid.", E_ERROR);
  }
} else {
  echo json_encode(array('success' => false, 'message' => "No file exists with ID $guid."));
  trigger_error("No file exists with ID $guid.", E_ERROR);
}

?>
