<?php declare(strict_types=1);

namespace App\Service;

use App\Repository\DataRepository;
use PHPUnit\Util\Exception;
use Symfony\Component\HttpKernel\Log\Logger;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly DataRepository $repository
    ){}

    public function getStats(): string
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://russianwarship.rip/api/v1/statistics/latest'
            )->toArray();

            return $this->parse($response['data']['stats']);
        } catch (Exception $exception) {
            $logger = new Logger();
            $logger->error($exception);

            return '';
        }

    }

    public function parse(array $data): string
    {
        return $this->repository->stringify($data);
    }
}