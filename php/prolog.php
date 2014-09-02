<?php

	function ask_prolog($request)
	{

	  $PROLOG_PATH = "prolog.exe";

		$pos = strpos($request, 'prolog');


		if($pos == 0) {
			$parts = explode(" ", $request);
			$request = $parts[2];
		}



		$result = shell_exec($PROLOG_PATH.' --quiet -f ../prolog/facts/mi_iw.pl -g '.$request.' 2>&1');
		if($parts[1] == "courses") {
			return "Folgende Kurse werden angeboten: ".substr($result, 0, -2).".";
		} else if($parts[1] == "modules") {
			return "Folgende Module musst du absolvieren: ".substr($result, 0, -2).".";
		} else {
			return $result;
		}
	}

	function ask_prolog_politely($request)
	{
		$result = shell_exec($PROLOG_PATH.' --quiet -f ../prolog/facts/mi_iw.pl -g "'.$request.'" 2>&1');
		return $result;
	}

?>
