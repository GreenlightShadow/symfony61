<?php

namespace App\Tests\Service;

use App\Repository\DataRepository;
use App\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiServiceTest extends KernelTestCase
{
    private HttpClientInterface $client;
    private DataRepository $repository;

    protected function setUp(): void
    {
        $this->client = $this->createMock(HttpClientInterface::class);
        $this->repository = $this->createMock(DataRepository::class);
        parent::setUp();
    }

    public function testParse()
    {
        $input = [
            "message" => "The data were fetched successfully.",
            "data" => [
                "date" => "2022-11-24",
                "day" => 274,
                "resource" => "https://www.facebook.com/MinistryofDefence.UA/posts/pfbid02g9XoR4emAY3N4VH9Vuy3rEfkE66tKELyHQeD2h3mMncFNW96agefDYeFdRaNYgAtl",
                "stats" => [
                    "personnel_units" => 85720,
                    "tanks" => 2898,
                    "armoured_fighting_vehicles" => 5839,
                    "artillery_systems" => 1889,
                    "mlrs" => 395,
                    "aa_warfare_systems" => 209,
                    "planes" => 278,
                    "helicopters" => 261,
                    "vehicles_fuel_tanks" => 4400,
                    "warships_cutters" => 16,
                    "cruise_missiles" => 531,
                    "uav_systems" => 1547,
                    "special_military_equip" => 161,
                    "atgm_srbm_systems" => 4
                ],
                "increase" => [
                    "personnel_units" => 310,
                    "tanks" => 1,
                    "armoured_fighting_vehicles" => 7,
                    "artillery_systems" => 2,
                    "mlrs" => 0,
                    "aa_warfare_systems" => 0,
                    "planes" => 0,
                    "helicopters" => 0,
                    "vehicles_fuel_tanks" => 4,
                    "warships_cutters" => 0,
                    "cruise_missiles" => 51,
                    "uav_systems" => 10,
                    "special_military_equip" => 0,
                    "atgm_srbm_systems" => 0
                ]
            ]
        ];

        $service = new ApiService($this->client, $this->repository);
        $result = $service->parse($input);

        $this->assertIsString($result);
    }
}