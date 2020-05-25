<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Names;

use App\Services\Builder\Parts\Accessories\Modifiers\NamesModificatorInterface;

abstract class AbstractName implements NamesModificatorInterface
{

    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

}
