<?php

if (!isset($_POST['code'])) {
	echo $_POST['code'];
}else{
	$repl = str_replace('"', "", $_POST['code']);
	$remove = preg_replace('/[\[(\s+)\]]/', '', $repl);

	$new = explode(',', $remove);
	$new_arr = [];
		foreach ($new as $key => $value) {
			$new = str_split($value, 2);
			
		}
}