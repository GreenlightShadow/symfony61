<?php declare(strict_types=1);

namespace App\Service;

use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Notifier\Message\ChatMessage;

class BotService
{

    public function __construct(private readonly ChatterInterface $chatter)
    {
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendTelegramNotification($data): void
    {
        $messageString = "Статистика войны на текущее время: \n\n$data";
        $message = (new ChatMessage($messageString));
        $this->chatter->send($message);
    }
}
