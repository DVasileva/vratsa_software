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
	$dec = [];
	$count = count($new_arr);
	for ($i=0; $i < $count; $i++) { 
		$dec[$i] = [];
		for ($j=0; $j < 3; $j++) { 
			foreach ($new_arr as $value) {
				$val = hexdec($new_arr[$i][$j]);
				$dec[$i][$j] = $val;
				
			}
		}
	}
	$search = [];
	foreach ($dec as $key => $value) {
		if ($value[1] > $value[0] && $value[1] > $value[2]) {
			$search[]=$key;
		}
	}
	echo "[";
	$count1 = count($search);
	for ($m=0; $m < $count1; $m++) {
		echo $search[$m]; 
		if ($m!= $count1-1 ) {
			echo ", ";
			
		}  
	}
	echo "]";
}
?>