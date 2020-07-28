<?php
require 'helpers/connect.php';
require 'helpers/vars.php';
include  'helpers/top2.php'; 

print "<h1>$pageTitle</h1>";   

$form = "<form action=\"createTable.php\" method=\"post\">";
$form .= "<label for='newTable' placeholder='windows_v10_072820'>New Table Name</label>";
$form .= "<div id='format'>Name the table with the following format - product_version_date e.g., tanzu_v2_010120 </div>";
$form .= "<input type=\"text\" id='newTable' placeholder='tanzu_v2_010120' name='newTable' aria-describedby='format' />";
$form .= "<input type='submit'>";
$form .= "</form>";

echo $form;


include  'helpers/bottom.php'; 

?>



