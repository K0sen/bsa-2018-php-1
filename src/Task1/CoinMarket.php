<?php declare(strict_types=1);

namespace Cryptocurrency\Task1;

class CoinMarket
{
    private $currencies = [];

    public function addCurrency(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }

    public function maxPrice(): float
    {
        $currencies = $this->getCurrencies();
        if (empty($currencies)) return 0;
        
        $currPrices = array_map(function($currency) {
            return $currency->getDailyPrice();
        }, $currencies);

        return max($currPrices);
    }

    public function getCurrencies(): array
    {
        return $this->currencies;
    }
}
