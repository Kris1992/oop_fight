<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Helmets;

class FullFaceHelmet extends Helmet
{

    public function __construct()
    {
        parent::__construct('Sworder Helmet', mt_rand(50,100));
    }

}
