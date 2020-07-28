<?php
require 'helpers/connect.php';
require 'helpers/vars.php';
include  'helpers/top2.php'; 

print "<h1>Create a New Table</h1>";

$form = "<form action=\"createTable.php\" method=\"post\">";
$form .= "<label for=''>New Table Name</label>";
$form .= "<input type=\"text\" id='newTable' name='newTable' />";
$form .= "<input type='submit'>";
$form .= "</form>";

echo $form;


include  'helpers/bottom.php'; 

?>



