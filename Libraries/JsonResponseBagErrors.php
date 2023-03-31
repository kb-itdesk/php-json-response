<?php

namespace Libraries\Errors;

class JsonResponseBagErrors
{
    protected array $errors = [];
    protected array $errorsCodes = [];

    public function addErrorCode(int $codes): JsonResponseBagErrors
    {
        $this->errorsCodes[] = $codes;

        return $this;
    }

    public function addMessage(string $message, int $code): JsonResponseBagErrors
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

    public function clear(): JsonResponseBagErrors
    {
        $this->errors = [];
        $this->errorsCodes = [];

        return $this;
    }
}
