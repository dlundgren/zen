<?php
declare(strict_types=1);

namespace WoohooLabs\Zen\Examples\Service;

use WoohooLabs\Zen\Examples\Utils\AnimalUtil;

class AnimalService implements AnimalServiceInterface
{
    /**
     * @var AnimalUtil
     */
    private $util;

    public function __construct(AnimalUtil $util)
    {
        $this->util = $util;
    }
}
