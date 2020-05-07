<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
include  'helpers/top.php';

foreach ($_POST as $param_name => $param_val) {
	if($param_name === 'id') {
		$id = $param_val; 
	} else {

		if($param_name !== 'database' && $param_name !== 'table'){
			$column = $param_name;
			$value = $param_val;
                        $value = htmlspecialchars($value, ENT_QUOTES);

			//remove underscores added to the post variables with spaces
      			$pattern = '/_/';
        		$replacement = ' ';//adding the space back
        		$column =  preg_replace($pattern, $replacement, $column);

			$query = "UPDATE $database.$table SET `$column` = \"$value\" WHERE id = $id";
			if ($result = mysqli_query($conn, $query)) {
				print "<p>$database $table $column updated</p>";
			} else {
				echo '<p class="error">Query failed!</p>';
				print $query;
			}
		}
	}  
}

include  'helpers/bottom.php';

?>

