<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Boots;

class ArmoredBoots extends Boots
{

    public function __construct()
    {
        parent::__construct('Armored Boots', mt_rand(50,100));
    }

}
