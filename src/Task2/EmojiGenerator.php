<?php declare(strict_types=1);

namespace Cryptocurrency\Task2;

class EmojiGenerator
{
    public $emoji = [
        '🚀',
        '🚃',
        '🚄',
        '🚅',
        '🚇',
    ];

    public function generate(): \Generator
    {
        foreach ($this->emoji as $emoji) {
            yield $emoji;
        }
    }
}