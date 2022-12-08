<?php

namespace App\Command;

use App\Service\ApiService;
use App\Service\BotService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:get-stats',
    description: 'Sends War statistics',
    aliases: ['app:war-stats'],
    hidden: false
)]

class GetWarStatisticsCommand extends Command
{
    public function __construct(
        private readonly BotService $botService,
        private readonly ApiService $api
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $data = $this->api->getStats();
        if ($data !== '') {
            $this->botService->sendTelegramNotification($data);

            return Command::SUCCESS;
        } else {
            return Command::FAILURE;
        }
    }
}