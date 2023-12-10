<?php
function transposeMatrix($matrix) {
    $transposedMatrix = [];

    foreach ($matrix as $rowIndex => $row) {
        foreach ($row as $colIndex => $value) {
            $transposedMatrix[$colIndex][$rowIndex] = $value;
        }
    }

    return $transposedMatrix;
}

$inputData = file_get_contents("php://input");

if (!empty($inputData)) {
    $matrix = json_decode($inputData, true);

    if ($matrix !== null) {
        $transposedMatrix = transposeMatrix($matrix["json_matrix"]);

        echo "Original Matrix:\n";
        echo json_encode($matrix, JSON_PRETTY_PRINT);

        echo "\nTransposed Matrix:\n";
        echo json_encode($transposedMatrix, JSON_PRETTY_PRINT);
    } else {
        echo "Invalid JSON data.";
    }
} else {
    echo "JSON matrix not provided in the POST body";
}
?>
