<?php

use \classes\Student as Student;
use \classes\Employee as Employee;

include_once(__DIR__ . '/classes/AbstractUser.php');
include_once(__DIR__ . '/classes/Employee.php');
include_once(__DIR__ . '/classes/Student.php');

// Student
$student = new Student(100);
var_dump($student->summ);
$student->increaseRevenue(25);
var_dump($student->summ);

// Employee
$employee = new Employee('2000');
var_dump($employee->summ);
$employee->increaseRevenue(150);
var_dump($employee->summ);
