<?php
function getRequestBody(): string
{
    $inputData = file_get_contents("php://input");

    if ($inputData === false) {
        throw new RuntimeException("Unable to retrieve input data.");
    }

    return $inputData;
}
