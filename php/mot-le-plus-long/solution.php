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
$nb_words = $input[0]; $m = 0;
/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
for ( $i = 1; $i < $nb_words; $i++) {
    $m = max(strlen($input[$i]), $m);
}
echo $m;
?>
