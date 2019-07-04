<?php

define('DB_NAME','prv');
define('DB_USER','root');
define('DB_PASSWORD','root');
define('DB_HOST','localhost');

			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if(mysqli_connect_errno()){
				echo "Failed to connect with database".mysqli_connect_err();
	}

	?>
