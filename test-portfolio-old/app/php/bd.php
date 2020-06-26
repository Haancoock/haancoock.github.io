<?php
	try {
		$DB =  new PDO(
			"mysql:host=localhost;
			dbname=portfolio",
			 "root", 
			 "");
	} catch (Exception $e) {
		echo $e->get.Message();
	};