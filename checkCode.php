<?php 

// echo $_POST['source'];
function mb_str_split( $string ) { 
    # Split at all position not after the start: ^ 
    # and not before the end: $ 
    return preg_split('/(?<!^)(?!$)/u', $string ); 
}


$results = mb_str_split($_POST['source']);
$count = 0;
foreach ($results as $result) {

	if(strlen($result)==1){
		echo $result;
	}else{
		$count++;
		echo '<span class="hightlight">'.$result.'</span>';
	}
}
if($count==0){
	echo '<script>alert("未检测到非英文字符");</script>';
}

 ?>