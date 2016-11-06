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
function nbVisibleLeft($n, $h) {
    $nb = array();
    $higher = array();
    $nbHigher = 0;
    for($i = 0; $i < $n; $i++) {
        $nb[] = $nbHigher;
        while($nbHigher > 0 && $higher[$nbHigher - 1] <= $h[$i]) {
            array_pop($higher);
            $nbHigher--;
        }
        $higher[] = $h[$i];
        $nbHigher++;
    }
    return $nb;
}

function nbVisible($input) {
    $n = intval($input[0]);
    $h = array();
    for($i = 0; $i < $n; $i++)
        $h[] = intval($input[1 + $i]);
    $left = nbVisibleLeft($n, $h);
    $right = array_reverse(nbVisibleLeft($n, array_reverse($h)));
    $nb = array();
    for($i = 0; $i < $n; $i++) {
        $nb[] = $left[$i] + $right[$i];
    }
    return $nb;
}

echo implode(" ", nbVisible($input)) . " ";


?>
