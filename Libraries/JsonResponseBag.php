<?php

namespace Libraries\Response;

use JsonException;

class JsonResponseBag
{
    private bool $success;
    private array $errors;
    private $data;

    /**
     * Response constructor.
     * @param bool $success
     * @param array|null $errors
     * @param null $data
     */
    public function __construct(bool $success = false, array $errors = null, $data = null)
    {
        $this->success = $success;
        $this->errors = $errors;
        $this->data = $data;
    }

    /**
     * @throws JsonException
     */
    public function toJson(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        exit(json_encode([
            "success" => $this->success,
            "errors" => $this->errors,
            "data" => $this->data,
        ], JSON_THROW_ON_ERROR));
    }

    public function toArray(): array
    {
        return array(
            "success" => $this->success,
            "errors" => $this->errors,
            "data" => $this->data,
        );
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatus(): bool
    {
        return $this->success;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setData($data): JsonResponseBag
    {
        $this->data = $data;

        return $this;
    }

    public function setErrors(array $errors): JsonResponseBag
    {
        $this->errors = $errors;

        return $this;
    }

    public function setStatus(bool $status): JsonResponseBag
    {
        $this->success = $status;

        return $this;
    }
}
