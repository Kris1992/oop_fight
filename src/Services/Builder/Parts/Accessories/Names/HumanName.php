<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Names;

class HumanName extends AbstractName
{   

    /* Avaible prefixes */
    private static $HumanPrefixes = [
        'Brave',
        'Great'
    ];

    public function __construct(string $name)
    {   
        parent::__construct($this->modifyName($name));
    }

    public function modifyName(string $name): string
    {   
        $key = array_rand(self::$HumanPrefixes, 1);
        return sprintf('%s %s', self::$HumanPrefixes[$key], $name);
    }

}
