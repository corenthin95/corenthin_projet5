<?php

namespace App\Models;

class Comment
{
    protected int $id;

    protected string $content;

    protected $date;

    protected bool $isValid;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return new \DateTime($this->date);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }
}