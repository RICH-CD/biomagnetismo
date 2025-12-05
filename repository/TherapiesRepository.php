<?php
class TherapiesRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Obtener información del paciente y su prediagnóstico a partir de una orden
     */
    public function getPrediagnosticByOrder($orderId) {
        $sql = "
            SELECT 
                u.UserId,
                u.Name,
                u.Email,
                u.Phone,
                u.Birthdate,
                u.Gender,
                u.MaritalStatus,
                u.Childrens,
                u.Residence,
                u.NOperations,
                p.JsonData AS prediagnostic
            FROM Orders o
            INNER JOIN Users u ON o.UserId = u.UserId
            INNER JOIN Prediagnostics p ON p.PreDiagnosticId = o.PrediagId
            WHERE o.OrderId = :orderId
              AND o.status = 'Pagado'
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return [
                'user' => [
                    'id' => $row['UserId'],
                    'nombre' => $row['Name'],
                    'email' => $row['Email'],
                    'phone' => $row['Phone'],
                    'edad' => $row['Birthdate']
                        ? (new DateTime($row['Birthdate']))->diff(new DateTime())->y
                        : null,
                    'genero' => $row['Gender'],
                    'estado_civil' => $row['MaritalStatus'],
                    'hijos' => $row['Childrens'],
                    'residencia' => $row['Residence'],
                    'n_operaciones' => $row['NOperations']
                ],
                'prediagnostic' => json_decode($row['prediagnostic'], true)
            ];
        }

        return null;
    }
}
?>