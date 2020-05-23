<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts;

abstract class Character
{
    /**
     * @var object[]
     */
    private $data = [];

    public function setPart(string $key, object $value)
    {
        $this->data[$key] = $value;
    }
}