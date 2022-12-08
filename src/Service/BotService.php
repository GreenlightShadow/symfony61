<?php declare(strict_types=1);

namespace App\Service;

use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Message\ChatMessage;

class BotService
{

    public function __construct(private readonly ChatterInterface $chatter)
    {
    }

    public function sendTelegramNotification($data): void
    {
        $message = (new ChatMessage($data));
        $this->chatter->send($message);
    }
}
