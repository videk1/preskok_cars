<?php
	$files = glob("*.js"); 
	$output = fopen("output.js", "w+"); // Če obstaja zbriše vsebino, če ne naredi novi file.
	foreach($files as $file){
		$input = fopen($file, "r");
		$filesize = filesize($file);
		if($filesize > 0){
			while ($line = fread($input, $filesize)){
			 	fwrite($output, $line);
			}
		}
		else {
			echo ($file . " has no content!");
		}
		fclose($input);
	}
	fclose($output);
	exit;
?>

