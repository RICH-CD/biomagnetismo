<?php
// filepath: d:\Desarrollos\2025\Aaron_Magnetismo\code\repository\PrediagnosticRepository.php

class PrediagnosticRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get prediagnostic and user data by OrderId
     *
     * @param int $orderId
     * @return array|null
     * @throws PDOException
     */
    public function getPrediagnosticByOrderId($orderId)
    {
        try {
            // First, get the order and its PreDiagnosticId
            $orderStmt = $this->pdo->prepare("
                SELECT o.UserId, o.PrediagId
                FROM Orders o
                WHERE o.OrderId = :orderId
                LIMIT 1
            ");
            $orderStmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
            $orderStmt->execute();
            $order = $orderStmt->fetch(PDO::FETCH_ASSOC);

            if (!$order) {
                return null; // Order not found
            }

            $userId = $order['UserId'];
            $prediagId = $order['PrediagId'];

            // Get user information
            $userStmt = $this->pdo->prepare("
                SELECT UserId, Name, Email, Phone, Birthdate, Gender, MaritalStatus, Childrens, Residence, NOperations
                FROM Users
                WHERE UserId = :userId
                LIMIT 1
            ");
            $userStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $userStmt->execute();
            $user = $userStmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return null; // User not found
            }

            // Get prediagnostic data
            $prediagStmt = $this->pdo->prepare("
                SELECT PreDiagnosticId, JsonData, PreDiagDate
                FROM Prediagnostics
                WHERE PreDiagnosticId = :prediagId AND UserId = :userId
                LIMIT 1
            ");
            $prediagStmt->bindParam(':prediagId', $prediagId, PDO::PARAM_INT);
            $prediagStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $prediagStmt->execute();
            $prediagnostic = $prediagStmt->fetch(PDO::FETCH_ASSOC);

            if (!$prediagnostic) {
                return null; // Prediagnostic not found
            }

            // Parse JSON data
            $jsonData = json_decode($prediagnostic['JsonData'], true);

            return [
                'user' => $user,
                'prediagnostic' => $jsonData,
                'prediagDate' => $prediagnostic['PreDiagDate']
            ];
        } catch (PDOException $e) {
            error_log("Database error in PrediagnosticRepository: " . $e->getMessage());
            throw $e;
        }
    }
}
?>