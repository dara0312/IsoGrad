<?php

/*******
 * Read input from STDIN
 * Use echo or print to output your result, use the PHP_EOL constant at the end of each result line.
 * Use:
 *      local_echo( $variable );
 * to display simple variables in a dedicated area.
 *
 * Use:
 *      local_print_r( $array );
 * to display arrays in a dedicated area.
 * ***/

$input = array();
while( $f = stream_get_line(STDIN, 10000, PHP_EOL) ) {
    $input[] = $f;
    /* Lisez les données et effectuez votre traitement */
}

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
function GenerateAllCases($dictionnary, $level) {
	if ($level == count($dictionnary) - 1) {
		return $dictionnary[$level];
	} else {
		foreach ($dictionnary[$level] as $string) {
			foreach (GenerateAllCases($dictionnary, $level + 1) as $next) {
				$result[] = $string . " " . $next;
			}
		}
	}
	return $result;
}

$components = explode( " ", $input[1]);
local_print_r($components);
$current_row = 2;
foreach($components as $level=>$component){
    for($iter=0;$iter<$component;$iter++){
        $dictionnary[$level][] = $input[$current_row];
        $current_row++;
    }
}

$all_cases = GenerateAllCases($dictionnary,0);
$result = 0;
for($iter=$current_row+1;$iter<count($input);$iter++){
    if (in_array($input[$iter], $all_cases)){
        $result++;
    }
}
echo $result;


?>
