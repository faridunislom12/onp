<?php

echo 'Для данных из файла '.$argv[1].' выполним операцию '.$argv[2].PHP_EOL;

$handle = fopen($argv[1], "r");
$filepos = fopen('fpos.txt', "w");
$fileneg = fopen('fneg.txt', "w");

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
		//echo $line.PHP_EOL;
		$numbers=explode(" ", $line);
		$code_str='$rslt='.floatval($numbers[0]).$argv[2].floatval($numbers[1]).';';
		eval($code_str);
		//echo $rslt.PHP_EOL;
		
		if ($rslt>0) {
			fputs($filepos, $rslt.PHP_EOL);
		} else {
			fputs($fileneg, $rslt.PHP_EOL);
		}
    }

    fclose($handle);
    fclose($filepos);
    fclose($fileneg);

	
echo 'Результаты сохранены в двух следующих файлах: fpos.txt и fneg.txt'.PHP_EOL;

	
} else {
    // error opening the file.
	echo 'can not open file';
} 

exit();


?>
