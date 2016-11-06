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
class RangeMinQuery {
    function __construct($t) {
        $this->INF = 100000;
        $this->n = 1;
        $length = count($t);
        while($this->n < $length)
            $this->n *= 2;
        $this->s = array_fill(0, 2 * $this->n, $this->INF);
        for($i = 0; $i < $length; $i++)
            $this->s[$this->n + $i] = $t[$i];
        for($p = $this->n - 1; $p >= 1; $p--)
            $this->s[$p] = min($this->s[2 * $p], $this->s[2 * $p + 1]);
    }
    function rangeMin($i, $k) {
        return $this->_rangeMin(1, 0, $this->n, $i, $k);
    }
    function _rangeMin($p, $start, $span, $i, $k) {
        if($start + $span <= $i || $k <= $start)
            return $this->INF;
        if($i <= $start and $start + $span <= $k)
            return $this->s[$p];
        $left = $this->_rangeMin(2 * $p, $start, floor($span / 2), $i, $k);
        $right = $this->_rangeMin(2 * $p + 1, $start + floor($span / 2), floor($span / 2), $i, $k);
        return min($left, $right);
    }
}

function maxBannerLength($input) {
    $n = intval($input[0]);
    $h = array();
    $pos = array();
    for($i = 0; $i < $n; $i++) {
        $height = intval($input[1 + $i]);
        $h[] = -$height;
        if(!isset($pos[$height]))
            $pos[$height] = array($i);
        else
            $pos[$height][] = $i;
    }
    $length = 0;
    $rmq = new RangeMinQuery($h);
    foreach($pos as $height => $t) {
        $m = count($t);
        for($i = 1; $i < $m; $i++) {
            $start = $pos[$height][$i - 1];
            $end = $pos[$height][$i];
            $highestBetween = -$rmq->rangeMin($start + 1, $end);
            if($highestBetween < $height)
                $length += $end - $start;
        }
    }
    return $length;
}

echo maxBannerLength($input) . "\n";


?>
