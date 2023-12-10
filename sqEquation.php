<?php
include 'form.html';

// Validation. Treating absent param. value as 0:
$a = (int)$_GET["a"] ?? 0;
$b = (int)$_GET["b"] ?? 0;
$c = (int)$_GET["c"] ?? 0;

// Presentation of equation:
$a_output = $a ? $a : null;
$b_output = $b ? $b : null;
$c_output = $c ? $c : null;

echo '<b>' . 'Equation: ' . '</b>' . '</br>';
echo 'y = ' . ($a_output ? $a_output . 'x^2' : '') . ($b_output ? ' +' .'(' . $b_output . ')' . 'x':'') . ($c_output ? '+' . $c_output : '') . '</br></br>';

// Solution:
function solveEquation($a, $b, $c) {
    $d = $b * $b - 4 * $a * $c;

    if ($a === 0) {
        if ($b === 0) {
            return 'No real solutions';
        } else {
            return -$c / $b;
        }
    }

    if ($d > 0) {
        $x1 = (-$b + sqrt($d)) / (2 * $a);
        $x2 = (-$b - sqrt($d)) / (2 * $a);
        return [$x1, $x2];
    } elseif ($d === 0) {
        $x = -$b / (2 * $a);
        return $x;
    } else {
        return 'No real solutions';
    }
}
// Output:
echo '<b>' . 'Solution: ' . '</b>' . '</br>';
$result = solveEquation($a, $b, $c);

if (is_array($result)) {
    echo "Two real solutions: x1 = {$result[0]}, x2 = {$result[1]}";
} elseif (is_numeric($result)) {
    echo "One real solution: x = $result";
} else {
    echo "No real solutions";
}
