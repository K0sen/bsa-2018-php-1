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
        $maxPrice = $market->maxPrice();
        $currencies = $market->getCurrencies();
        $currCount = count($currencies);
        $maxPriceColumn = "<td rowspan='{$currCount}'>{$maxPrice}</td>";

        foreach ($currencies as $key => $currency) {
            // For printing max price column
            if ($key > 0)
                $maxPriceColumn = null;

            $currName = $currency->getName();
            $currLogo = $currency->getLogoUrl();
            $currPrice = $currency->getDailyPrice();
            $rows .= <<<HEREDOC
            <tr>
                <td>{$currName}: {$currPrice}</td>
                <td>
                    <img src="{$currLogo}">
                </td>
                {$maxPriceColumn}
            </tr>
HEREDOC;

        }

        return $rows;
    }
}
