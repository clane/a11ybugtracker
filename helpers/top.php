<?php include('helpers/vars.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<title>VMware A11y Bug Tracker <?php print $database.$table; ?></title>
		<link rel="stylesheet" href="https://unpkg.com/@clr/ui/clr-ui.min.css" />
		<link rel="stylesheet" href="1.css" />
	</head>
	<body>
    <div id="page">
	<img src="https://www.vmware.com/etc/clientlibs/vmwaredevapp/clientlib-nav-redesign/images/vm-logo.png" alt="vmware">

<?php

if( !preg_match('/index.php/', $_SERVER['REQUEST_URI'] )){
print "<p><a href=\"index.php?database=$database&table=$table\">a11y bug tracker home - $database $table</a></p>";
}

?>
