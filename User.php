<?php
// Abstract base class for all library users.
abstract class User
{
    protected int $id;
    protected string $name;
    protected string $email;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;

        // Use the setter so the email is validated during initialization.
        $this->setEmail($email);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email address: " . $email);
        }

        $this->email = $email;
    }

    abstract public function getRole(): string;

    abstract public function getDetails(): string;
}
