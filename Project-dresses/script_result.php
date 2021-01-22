<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<p>These are the dresses with dominant green color : </p>
<?php

if (!isset($_POST['code'])) {
	echo $_POST['code'];
}else{
	$repl = str_replace('"', "", $_POST['code']);
	$remove = preg_replace('/[\[(\s+)\]]/', '', $repl);
	//var_dump($remove);

	$new = explode(',', $remove);
	$new_arr = [];
		foreach ($new as $key => $value) {
			$new = str_split($value, 2);
			$new_arr[] = $new;
		}
		$hdec = [];
		$count = count($new_arr);
		for ($i=0; $i < $count ; $i++) { 
			$hdec[$i] = [];
			for ($i=0; $i < 3; $i++) { 
				foreach ($new_arr as $value) {
					$val = hexdec($new_arr[$i][$j])
					$new_arr[$i][$j]= $val;
					
				}
			}
		}

}
?>