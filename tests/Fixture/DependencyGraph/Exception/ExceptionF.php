<?php
declare(strict_types=1);

namespace WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Exception;

class ExceptionF
{
    /**
     * @Inject
     * @var ExceptionA
     */
    protected static $a;
}
