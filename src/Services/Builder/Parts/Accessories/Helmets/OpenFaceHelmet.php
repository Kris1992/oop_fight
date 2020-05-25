<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Helmets;

class OpenFaceHelmet extends Helmet
{

    public function __construct()
    {
        parent::__construct('Wooden Helmet', mt_rand(20,50));
    }

}
