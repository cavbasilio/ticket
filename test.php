<?php
class TicketManager {
    private DateTimeImmutable $startTime;
    
    public function __construct() {
        $this->startTime = new DateTimeImmutable(); // Data/hora inicial ao criar o objeto
    }
    
    public function stopTicket(): void {
        $endTime = new DateTimeImmutable(); // Data/hora final ao finalizar o ticket
        $timeDiff = $endTime->getTimestamp() - $this->startTime->getTimestamp(); // Diferença em segundos
        
        // Salvar $timeDiff no banco de dados ou onde for necessário
        echo "Tempo total utilizado: " . gmdate("H:i:s", $timeDiff); // Exibe o tempo total formatado HH:MM:SS
    }
}

// Exemplo de uso:
$ticketManager = new TicketManager();
$ticketManager->stopTicket();
