<?php
$guid = $_POST['guid'];
$json = $_POST['savedata'];
$filename = "/Repository/$guid.json";

$output = json_decode($json);
if ($output && $output != $json) {
  $filetosave = fopen($filename, "w") or die(json_encode(array('success' => false, 'message' => "Unable to create/open file.")));
  fwrite($filetosave, $json) or die(json_encode(array('success' => false, 'message' => "Unable to write to file.")));
  fclose($filetosave) or die(json_encode(array('success' => false, 'message' => "Unable to close file.")));
} else {
  echo json_encode(array('success' => false, 'message' => "Input is empty or invalid."));
}

?>
