<?php

	function conn(){
		  $dbhost = 'localhost:3036';
		  $dbuser = 'root';
		  $dbpass = 'slack142';    	
    	  $dbase = '/var/lib/mysql/breakTime';
    	  $conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);

    	  if($conn){

    	  	echo "Success";
    	  }

    	  else{

    	  	echo "Failure"
    	  }
    	}

?>