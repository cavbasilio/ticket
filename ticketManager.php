<?php
session_start();
include 'conn.php';

class TicketManager {
    private DateTimeImmutable $startTime;
    private int $id;

    public function __construct($id = null) {
        if ($id) {
            // Se um ID for fornecido, busca o tempo de início do banco de dados
            global $conn;
            $stmt = $conn->prepare("SELECT start_time FROM tickets WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $this->startTime = new DateTimeImmutable($result['start_time']);
                $this->id = $id;
            } else {
                throw new Exception("ID inválido");
            }
        } else {
            $this->startTime = new DateTimeImmutable(); // Data/hora inicial ao criar o objeto
            $this->saveStartTime();
        }
    }

    private function saveStartTime(): void {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO tickets (start_time) VALUES (:start_time)");
        $stmt->execute(['start_time' => $this->startTime->format('Y-m-d H:i:s')]);
        $this->id = $conn->lastInsertId();
        $_SESSION['ticket_id'] = $this->id;
    }

    public function stopTicket(): string {
        global $conn;
        $endTime = new DateTimeImmutable(); // Data/hora final ao finalizar o ticket
        $timeDiff = $endTime->getTimestamp() - $this->startTime->getTimestamp(); // Diferença em segundos
        
        // Atualizar o banco de dados com stop_time e elapsed_time
        $stmt = $conn->prepare("UPDATE tickets SET stop_time = :stop_time, elapsed_time = :elapsed_time WHERE id = :id");
        $stmt->execute([
            'stop_time' => $endTime->format('Y-m-d H:i:s'),
            'elapsed_time' => $timeDiff,
            'id' => $this->id
        ]);

        // Retorna o tempo total formatado HH:MM:SS
        return "Tempo total utilizado: " . gmdate("H:i:s", $timeDiff);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json'); // Garantir que o cabeçalho de resposta seja JSON
    if ($_POST['action'] === 'start') {
        try {
            $ticketManager = new TicketManager();
            echo json_encode(['id' => $_SESSION['ticket_id']]);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } elseif ($_POST['action'] === 'stop' && isset($_SESSION['ticket_id'])) {
        try {
            $ticketManager = new TicketManager($_SESSION['ticket_id']);
            echo json_encode(['message' => $ticketManager->stopTicket()]);
            unset($_SESSION['ticket_id']);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
