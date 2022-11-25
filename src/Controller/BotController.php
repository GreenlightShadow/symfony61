<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\ApiService;
use App\Service\BotService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BotController extends AbstractController
{

    public function __construct(
        private readonly BotService $botService,
        private readonly ApiService $api
    )
    {}


    #[Route('/bot')]

    public function index(): JsonResponse
    {
        $data = $this->api->getStats();
        $this->botService->sendTelegramNotification($data);

        return $this->json('Success');
    }
}