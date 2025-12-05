<?php

require_once '../config/database.php'; // Include database connection

class UserRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Insert a new user into the database.
     *
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $birthdate
     * @param string $gender
     * @param string $maritalStatus
     * @param string $childrens
     * @param string $residence
     * @param string $operations
     * @param string $password
     * @param string $role
     * @return void
     * @throws PDOException
     */
    public function insertUser($name, $email, $phone, $password, $role, $birthdate = null, $gender = null, $maritalStatus = null, $childrens = null, $residence = null, $operations = null)
    {
        $stmt = $this->pdo->prepare("INSERT INTO Users (Name, Email, Phone, Birthdate, Gender, MaritalStatus, Childrens, Residence, NOperations, Password, Rol, RegisteredDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $phone, $birthdate, $gender, $maritalStatus, $childrens, $residence, $operations, $password, $role]);
    }
}