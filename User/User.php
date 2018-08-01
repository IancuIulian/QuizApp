<?php
declare(strict_types=1);


class User
{
    protected $id;
    protected $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return PHP_EOL . 'Logged in with email: ' . $this->getEmail() . PHP_EOL;
    }
}
