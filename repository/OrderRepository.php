<?php
class OrderRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Obtiene todas las órdenes pendientes junto con datos del paciente
     */
    public function getPendingOrders()
    {
        $sql = "
            SELECT 
                o.OrderId,
                u.Name,
                u.Phone,
                o.CreationDate
            FROM Orders o
            INNER JOIN Users u ON u.UserId = o.UserId
            WHERE o.Status = 'Pendiente'
            ORDER BY o.CreationDate DESC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPendingTherapies()
    {
        $sql = "
            SELECT 
                o.OrderId,
                u.Name,
                u.Phone,
                o.CreationDate
            FROM Orders o
            INNER JOIN Users u ON u.UserId = o.UserId
            WHERE o.Status = 'Pagado'
            ORDER BY o.CreationDate DESC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Marca una orden como pagada
     */
    public function markAsPaid($orderId)
    {
        $sql = "UPDATE Orders 
                SET Status = 'Pagado'
                WHERE OrderId = :orderId AND Status = 'Pendiente'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':orderId' => $orderId]);

        return $stmt->rowCount() > 0; // true si se actualizó alguna fila
    }

    /**
     * Marca una orden como terapia enviada
     */
    public function markAsSent($orderId)
    {
        $sql = "UPDATE Orders 
                SET Status = 'Enviada'
                WHERE OrderId = :orderId AND Status = 'Pagado'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':orderId' => $orderId]);

        return $stmt->rowCount() > 0; // true si se actualizó alguna fila
    }
}
?>