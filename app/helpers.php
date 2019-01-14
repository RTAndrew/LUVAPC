<?php


use Carbon\Carbon;



// Saber a idade atraves da DATA_NASCIMENTO e a DATA_ACTUAL
    function getDiffYears($data){
    	$created = new Carbon($data);
		$now = Carbon::now();

		// $difference = ($created->diff($now)->days);

		$difference = ($created->diffInYears($now));

		return $difference;
    }


