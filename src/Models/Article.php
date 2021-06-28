<?php

namespace App\Models;

class Article
{
    protected int $id;

    protected string $title;

    protected string $leadParagraph;

    protected string $content;

    protected $lastUpdate;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getLeadParagraph(): string
    {
        return $this->leadParagraph;
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
    public function getLastUpdate()
    {
        return new \DateTime($this->lastUpdate);
    }
}