<?php

namespace App\Models;

class Comment
{
    protected $id;

    protected $content;

    protected $date;

    protected $isValid;

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