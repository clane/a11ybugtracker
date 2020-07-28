<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getColNames.php';
include 'helpers/top.php';

print "<h1>A11y Reporting Home</h1>";

print "<ul>";
print "<li><a href=\"./enterForm.php?database=$database&table=$table\">Enter a bug in database:$database table:$table</a></li>"; 
print "<li><a href=\"./sortTable.php?database=$database&table=$table\">View all bugs in database:$database table:$table</a></li>"; 
#print "<li><a href=\"./vpatView.php?database=$database&table=$table\">VPAT View database:$database table:$table</a></li>"; 
#print "<li><a href=\"./vpatContent.php?database=$database&table=$table\">VPAT Content database:$database table:$table</a></li>"; 
print "<li><a href=\"./manageTable.php?database=$database&table=$table\">Manage all bugs in database:$database table:$table</a></li>"; 
print "<li><a href=\"./csvExport.php?database=$database&table=$table\">Export all bugs in database:$database table:$table to CSV</a></li>"; 
print "</ul>";

include  'helpers/bottom.php';

?>



