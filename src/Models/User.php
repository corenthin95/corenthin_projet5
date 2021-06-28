<?php

namespace App\Models;

class User
{
    protected int $id;

    protected string $pseudo;

    protected string $name;

    protected string $firstname;

    protected string $email;

    protected bool $isAdmin;

    protected string $password;

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
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}

