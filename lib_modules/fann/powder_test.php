<?php
$sea_file = (dirname(__FILE__) . "/powder_float.net");
if (!is_file($sea_file))
    die("Файл powder_float.net не был создан! Перезапустите главный файл, чтобы его создать");
 
$ann = fann_create_from_file($sea_file);
if (!$ann)
    die("ANN не была создана");
 
$input = array(0.1166, 0.4375, 0.758, 0.474, 0.247, 0.800, 0.3646); // вносим тестовые данные
$calc_out = fann_run($ann, $input);
//echo "С такими параметрами, получается такая программа замеса:<br>";

$nomer_prog = floor ($calc_out[0] * 100);
$speed1     = ceil  ($calc_out[1] * 1000);
$speed2     = ceil  ($calc_out[2] * 1000);

//    printf($nomer_prog);
//	printf($calc_out[1]);
//	print_r($calc_out);
 
fann_destroy($ann);

?>
