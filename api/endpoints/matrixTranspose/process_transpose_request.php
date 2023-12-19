<?php

require_once __DIR__ ."/../../../src/matrixTranspose/transponse_logic.php";
require_once __DIR__ ."/../../../src/matrixTranspose/transponse_ready_checker.php";
require_once __DIR__ ."/../../../src/matrixTranspose/get_request_body.php";

class ProcessResult
{
    private string $status;
    private mixed $data;

    public function __construct(string $status, mixed $data)
    {
        $this->status = $status;
        $this->data = $data;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}

/**
 * @return ProcessResult
 */
function processRequest(): ProcessResult
{
    try
    {
        $data = getRequestBody();
        $jsonArray = json_decode($data, true);

        switch (true)
        {
            case ($jsonArray === null && json_last_error() !== JSON_ERROR_NONE):
                throw new RuntimeException("Invalid JSON in the request body.");

            case !isMatrixEligibleForTranspose($jsonArray):
                http_response_code(400); // Bad Request
                return new ProcessResult("error", "Matrix is not eligible for transposition.");

            default:
                // Success case
                $transposedMatrix = transposeMatrix($jsonArray);
                return new ProcessResult("success", $transposedMatrix);
        }
    }
    catch (MatrixTransposeException $e)
    {
        http_response_code(400); // Bad Request
        return new ProcessResult("error", $e->getMessage());
    }
    catch (RuntimeException $e)
    {
        http_response_code(500); // Internal Server Error
        return new ProcessResult("error", $e->getMessage());
    }
}

$result = processRequest();
echo json_encode(["status" => $result->getStatus(), "data" => $result->getData()]);
