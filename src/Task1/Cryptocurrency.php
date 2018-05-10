<?php declare(strict_types=1);

namespace Cryptocurrency\Task1;

abstract class Cryptocurrency implements Currency
{
    protected $name;
    protected $logoUrl;
    protected $price;

    public function __construct(float $price)
    {
        $this->price = $price;
        // sets name according to class name
        $this->name = (new \ReflectionClass($this))->getShortName();
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function getDailyPrice(): float 
    {
        return $this->price;
    }

    public function getLogoUrl(): string 
    {
        return $this->logoUrl;
    }
}