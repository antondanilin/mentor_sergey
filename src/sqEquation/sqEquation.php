<?php
include 'form.html';
echo "<pre>";
// Validation. Treating absent param. value as 0:
$a = (float)$_GET["a"] ?? 0;
$b = (float)$_GET["b"] ?? 0;
$c = (float)$_GET["c"] ?? 0;

// Equation output:
printf("Equation: %s ", PHP_EOL);
$equation = ["","",""];

switch (true) {
    case $a: $equation[0] = $a;
    case $b: $equation[1] = $b;
    case $c: $equation[2] = $c;
}

printf("y = %sx^2 + (%s)x + %s%s", $equation[0], $equation[1], $equation[2], PHP_EOL);

// Solution:
function solveEquation($a, $b, $c): array {

    if ($a === 0) {
        if ($b === 0) {
            return [];
        } else {
            $x = -$c / $b;
            return [$x, $x];
        }
    }

    $d = $b * $b - 4 * $a * $c;

    switch (true) {
        case $d < 0:
        {
            return [];
        }
        case $d === 0:
        {
            $x = -$b / (2 * $a);
            return [$x];
        }
        default:
        {
            $x1 = (-$b + sqrt($d)) / (2 * $a);
            $x2 = (-$b - sqrt($d)) / (2 * $a);
            return [$x1, $x2];
        }
    }
}
// Output:
printf("Solution: %s", PHP_EOL);

$result = solveEquation($a, $b, $c);

switch (true) {
    case count($result) == 0:
        printf("Real solution doesn't exist");
        break;
    default:
        printf("x1, x2 = %s, %s", ...$result);
}
