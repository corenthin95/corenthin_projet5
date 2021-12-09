<?php

namespace App\Application\Http;

class Parameter 
{
    protected string $type;

    protected string $key;

    protected $value;

    public function __construct(string $type, string $key, $value)
    {
        $this->type = $type;
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}