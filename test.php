<?php 
function hex2bin($hexdata) {
    $bindata = '';
    for($i=0; $i < strlen($hexdata); $i += 2) {
        $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
    }
    return $bindata;
}
	$str = $_POST['str'];
	$len = strlen($str) / 2;	
	$s = '';
	for($i=0;$i<$len-1;$i++){
		$s .= substr($str,$i*4,2);
	}
	echo hex2bin("0x" .$s);
?>

<form method="post">
	<textarea rows="20" cols="100" name="str" value="<?php echo $str;?>"></textarea>
	<input type="submit"></input>
</form>
<?php

?>
<script>
</script>