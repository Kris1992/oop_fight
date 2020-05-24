<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Names;

class MonsterName extends AbstractName
{   

    /* Avaible prefixes */
    private static $MonsterPrefixes = [
        'Creepy',
        'Huge'
    ];

    public function __construct(string $name)
    {   
        parent::__construct($this->modifyName($name));
    }

    public function modifyName(string $name): string
    {   
        $key = array_rand(self::$MonsterPrefixes, 1);
        return sprintf('%s %s', self::$MonsterPrefixes[$key], $name);
    }

}
