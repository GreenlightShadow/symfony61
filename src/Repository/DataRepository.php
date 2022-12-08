<?php declare(strict_types=1);

namespace App\Repository;

use Symfony\Contracts\Translation\TranslatorInterface;

class DataRepository
{

    public function __construct(private readonly TranslatorInterface $translator)
    {
    }

    public function stringify(array $array): string
    {
        $result = $this->translator->trans('title');
        foreach ($array as $key => $value) {
            $key = $this->translator->trans($key);
            $result .= "$key : $value \n";
        }

        return $result;
    }
}