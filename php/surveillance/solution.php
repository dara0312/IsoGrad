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
    /*Read the input here and perform the calculations*/
}

  /*You can also perform the calculations once you have read all the data.*/
  $total = 0;
  list($lat_min, $lon_min, $lat_max, $lon_max) = explode(' ', $input[0]);
  $nb_per = $input[1];
  for($i=2; $i<=$nb_per+1; $i++){
      list($lat, $lon) = explode(' ', $input[$i]);
      if($lat>=$lat_min && $lat<= $lat_max && $lon>=$lon_min && $lon<=$lon_max)
          $total++;
  }
  echo $total;
?>
