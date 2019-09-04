<?php


//--------Leap year
/*
if (year is not divisible by 4) then (it is a common year)
else if (year is not divisible by 100) then (it is a leap year)
else if (year is not divisible by 400) then (it is a common year)
else (it is a leap year)
*/
function Leap_year(int $year) {
    if ($year <= 0) return;
    if ($year % 4 == 0) {
        if ($year % 100 > 0) return true;
        if ($year % 400 > 0) return;
        return true;
    }
    return;
}


//---------Sort array
$array = [7, 5, 1, 12, 7, 135, 1, -12];
//native sort
rsort($array);
//custom sort
usort($array, function(int $a, int $b) {
   return $b > $a; 
});

//----------Sort multidimensional array
$array =
[
    [
        'name' => 'John Doe',
        'age' => 55
    ],
    [
        'name' => 'Richard Roe',
        'age' => 36
    ],
    [
        'name' => 'Ben Dover',
        'age' => 99
    ],
    [
        'name' => 'Dev Null',
        'age' => 12
    ],
    [
        'name' => 'Mike Rotch',
        'age' => 43
    ]
];
usort($array, function(array $a, array $b) {
   return $b['age'] > $a['age']; 
});

//----------File converter
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/ulkas/csv/master/test.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
$tsv = [];
foreach ($csv as $line) {
    $tsv[] = '"' . implode($line,"\"\t\"") . '"';
}
$tsv = implode($tsv, "\n");


//---------data scrapper
//the original page was not available at the time of this test, got it from the cache instead
$target = file_get_contents('http://webcache.googleusercontent.com/search?q=cache:x0oJNkZ-MUoJ:https://tycho.usno.navy.mil/cgi-bin/timer.pl&hl=en&gl=ae&strip=0&vwsrc=1');
$target = explode('UTC', $target)[0];
$target = explode('BR', $target); //<BR>Sep. 03, 02:44:55 
$target = array_pop($target); //>Sep. 03, 02:44:55  
$target = htmlspecialchars_decode($target);
$target =  trim($target);
$target = substr($target, 1); //Sep. 03, 02:44:55"
$time = strtotime($target);
$time = date_format(date_create('@'. $time), 'c');




//----------Caesar cipher
function Caesar_encode(string $text, int $shift) : string {
    $return = "";
    $text = str_split($text);
    foreach ($text as $c) {
        $s = ord($c) + $shift;
        if ($s > 255) $s -= 255;
        $return .= chr($s);
    }
    return $return;    
}
function Caesar_decode(string $text, int $shift) : string {
    $return = "";
    $text = str_split($text);
    foreach ($text as $c) {
        $s = ord($c) - $shift;
        if ($s < 0) $s += 255;
        $return .= chr($s);
    }
    return $return;    
}


?>