<?php
$id = $_POST['id'];
$arr = array('a' => $id, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
?>
