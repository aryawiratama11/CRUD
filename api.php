<?php
	if(isset($_GET['sender']) && isset($_GET['text']))
	{
		$the_sender = $_GET['sender'];
		$the_text = $_GET['text'];
		$file = "data.json";

		$as_json = '{"sender":"'.$the_sender.'", "text":"'.$the_text.'"}';

		if(file_get_contents($file) != '')
		{
			$as_json = ','.$as_json;
		}

		file_put_contents($file, $as_json, FILE_APPEND);

		$data = file_get_contents('data.json');
		echo '['.$data.']';
	}
	else
	{
		$data = file_get_contents('data.json');
		echo '['.$data.']';
	}
?>