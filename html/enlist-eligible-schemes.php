<?php

	$op = [];

	for($i = 0; $i < 3; $i++){
		array_push($op, new stdClass());
		$op[$i]->name = "PM Jan Dhan Yojana";
		$op[$i]->description = "Any citizen below poverty line can create a bank account without minimum credits requirements.";
		$op[$i]->icon = "https://i0.wp.com/blog.forumias.com/wp-content/uploads/2018/05/BeFunkyDesign-810x579.jpg?fit=994%2C569&ssl=1";
		$op[$i]->link = "https://pmjdy.gov.in/";
	}

	echo json_encode($op);
?>
