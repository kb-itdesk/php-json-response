<?php

namespace Libraries\Errors;

class JsonResponseErrors
{
    protected array $errors = [];
    protected array $errorsCodes = [];

    public function addErrorCode(int $codes): JsonResponseErrors
    {
        $this->errorsCodes[] = $codes;

        return $this;
    }

    public function addMessage(string $message, int $code): JsonResponseErrors
    {
        $this->errors[] = array(
            "message" => $message,
            "code" => $code,
        );

        return $this;
    }

    public function getAllErrors(): array
    {
        return array_merge($this->errors, $this->errorsCodes);
    }

    public function getErrorsMessages(): array
    {
        return $this->errors;
    }

    public function getErrorsCodes(): array
    {
        return $this->errorsCodes;
    }

    public function hasError(): bool
    {
        return !empty($this->getAllErrors());
    }

    public function clear(): JsonResponseErrors
    {
        $this->errors = [];
        $this->errorsCodes = [];

        return $this;
    }
}
