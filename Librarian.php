<?php
require_once __DIR__ . '/User.php';

// A Librarian is another type of User.
class Librarian extends User
{
    private string $employeeId;
    private string $shift;

    public function __construct(
        int $id,
        string $name,
        string $email,
        string $employeeId,
        string $shift
    ) {
        parent::__construct($id, $name, $email);
        $this->employeeId = $employeeId;
        $this->shift = $shift;
    }

    public function getEmployeeId(): string
    {
        return $this->employeeId;
    }

    public function getShift(): string
    {
        return $this->shift;
    }

    public function getRole(): string
    {
        return "Librarian";
    }

    public function getDetails(): string
    {
        return "ID: {$this->getId()}\n"
            . "Name: {$this->getName()}\n"
            . "Email: {$this->getEmail()}\n"
            . "Role: {$this->getRole()}\n"
            . "Employee ID: {$this->employeeId}\n"
            . "Shift: {$this->shift}";
    }
}
