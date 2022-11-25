<?php

namespace App\Tests\Repository;

use App\Repository\DataRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Contracts\Translation\TranslatorInterface;

class DataRepositoryTest extends KernelTestCase
{
    private TranslatorInterface $translator;

    protected function setUp(): void
    {
        $this->translator = $this->createMock(TranslatorInterface::class);
        parent::setUp();
    }

    public function testStringify()
    {
        $repository = new DataRepository($this->translator);
        $result = $repository->stringify(['key' => 'value']);

        $this->assertIsString($result);
    }
}