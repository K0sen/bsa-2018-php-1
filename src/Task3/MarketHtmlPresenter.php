<?php declare(strict_types=1);

namespace Cryptocurrency\Task3;

use Cryptocurrency\Task1\CoinMarket;

class MarketHtmlPresenter
{
    public function present(CoinMarket $market): string
    {
        return <<<HEREDOC
        <table border="1" cellspacing="0" cellpadding="7" >
            <thead>
                <tr>
                    <th>Name: price</th>
                    <th>Logo</th>
                    <th>Max Price</th>
                </tr>
            </thead>
            <tbody>
                {$this->getCryptoRows($market)}
            </tbody>
        </table>
HEREDOC;
    }

    private function getCryptoRows(CoinMarket $market): string
    {
        $rows = '';
        $maxPriceColumn = "<td rowspan='{count($currencies)}'>{$market->maxPrice()}</td>";

        foreach ($market->getCurrencies() as $key => $currency) {
            // For printing max price column
            if ($key > 0)
                $maxPriceColumn = null;

            $rows .= <<<HEREDOC
            <tr>
                <td>{$currency->getName()}: {$currency->getDailyPrice()}</td>
                <td>
                    <img src="{$currency->getLogoUrl()}">
                </td>
                {$maxPriceColumn}
            </tr>
HEREDOC;
        }

        return $rows;
    }
}
