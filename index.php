<?php

abstract class Employee
{
    protected $name;
    protected $position;

    public function __construct($name, $position)
    {
        $this->name = $name;
        $this->position = $position;
    }

    abstract public function calculateSalary();

    public function getDetails()
    {
        return "Name: {$this->name}, Position: {$this->position}";
    }
}

class FullTimeEmployee extends Employee
{
    private $fixedSalary;

    public function __construct($name, $position, $fixedSalary)
    {
        parent::__construct($name, $position);
        $this->fixedSalary = $fixedSalary;
    }

    public function calculateSalary()
    {
        return $this->fixedSalary;
    }
}

class PartTimeEmployee extends Employee
{
    private $hourlyRate;
    private $hoursWorked;

    public function __construct($name, $position, $hourlyRate, $hoursWorked)
    {
        parent::__construct($name, $position);
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }

    public function calculateSalary()
    {
        return $this->hourlyRate * $this->hoursWorked;
    }
}

$employees = [
    new FullTimeEmployee("Alice", "Manager", 60000),
    new PartTimeEmployee("Bob", "Assistant", 20, 25), 
    new FullTimeEmployee("Charlie", "Developer", 80000),
    new PartTimeEmployee("Diana", "Intern", 15, 20) 
];

foreach ($employees as $employee) {
    echo $employee->getDetails() . "\n";
    echo "Salary: $" . $employee->calculateSalary() . "\n\n";
}

echo "Press Enter to exit...";
$f = readline();

/*
    $fullTimeEmployee = new FullTimeEmployee("Alice", "Manager", 60000);
    assert($fullTimeEmployee->getDetails() === "Name: Alice, Position: Manager", "FullTimeEmployee details are incorrect.");
    assert($fullTimeEmployee->calculateSalary() === 60000, "FullTimeEmployee salary calculation is incorrect.");


    $partTimeEmployee = new PartTimeEmployee("Bob", "Assistant", 20, 25);
    assert($partTimeEmployee->getDetails() === "Name: Bob, Position: Assistant", "PartTimeEmployee details are incorrect.");
    assert($partTimeEmployee->calculateSalary() === 500, "PartTimeEmployee salary calculation is incorrect.");


    $fullTimeEmployee2 = new FullTimeEmployee("Charlie", "Developer", 80000);
    assert($fullTimeEmployee2->calculateSalary() === 80000, "FullTimeEmployee2 salary calculation is incorrect.");


    $partTimeEmployee2 = new PartTimeEmployee("Diana", "Intern", 15, 20);
    assert($partTimeEmployee2->calculateSalary() === 300, "PartTimeEmployee2 salary calculation is incorrect.");
*/