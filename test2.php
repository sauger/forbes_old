<?php
		header("Content-Type: application/json");
		class Info {
			var $id;
			var $value;
			var $info;
		}
		$info1 = new Info();
		$info1->id = 1;
		$info1->value="中国";
		$info1->info = "中国";
		$info2 = new Info();
		$info2->id = 2;
		$info2->value="中国2";
		$info2->info = "中国2";
		$a = Array();
		array_push($a, $info1,$info2);
		$result = Array("results" => $a);
		echo json_encode($result);