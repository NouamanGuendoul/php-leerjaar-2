<?php

abstract class Person {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function determineRole();

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

class Patient extends Person {
    public function determineRole() {
        return "Patient";
    }
}

abstract class Staff extends Person {
    protected $salary;

    abstract public function calculateSalary();

    public function __construct($name, $salary) {
        parent::__construct($name);
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }
}

class Doctor extends Staff {
    public function calculateSalary() {
        // Voorbeeld: basis salaris van een dokter
        return $this->getSalary();
    }

    public function determineRole() {
        return "Doctor";
    }
}

class Nurse extends Staff {
    public function calculateSalary() {
        // Voorbeeld: basis salaris van een verpleegkundige
        return $this->getSalary();
    }

    public function determineRole() {
        return "Nurse";
    }
}

class Appointment {
    private $doctor;
    private $patient;
    private $startTime;
    private $endTime;

    public function __construct($doctor, $patient, $startTime, $endTime) {
        $this->doctor = $doctor;
        $this->patient = $patient;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getDuration() {
        // Bereken de duur van de afspraak in uren
        $start = strtotime($this->startTime);
        $end = strtotime($this->endTime);
        $duration = ($end - $start) / 3600; // Omzetten naar uren
        return $duration;
    }

    public function calculateCost() {
        // Bereken de kosten van de afspraak op basis van het salaris van de dokter en eventueel een bonus voor de verpleegkundige
        $doctorSalary = $this->doctor->calculateSalary();
        $cost = $doctorSalary * $this->getDuration();
        return $cost;
    }
}

// Voorbeeldgebruik
$patient = new Patient("John Doe");
$doctor = new Doctor("Dr. Smith", 100);
$appointment = new Appointment($doctor, $patient, "2024-03-04 09:00:00", "2024-03-04 11:00:00");

echo "Appointment for: " . $appointment->getDuration() . " hours.<br>";
echo "Cost of appointment: $" . $appointment->calculateCost() . "<br>";

?>