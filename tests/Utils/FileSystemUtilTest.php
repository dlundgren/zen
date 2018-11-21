<?php
declare(strict_types=1);

namespace WoohooLabs\Zen\Tests\Utils;

use PHPUnit\Framework\TestCase;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\EntryPoint\EntryPointA;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\EntryPoint\EntryPointC1;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\EntryPoint\EntryPointC2;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\EntryPoint\EntryPointEInterface;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\EntryPoint\EntryPointGAbstract;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\EntryPointD1\EntryPointD1;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\EntryPointD2\EntryPointD2;
use WoohooLabs\Zen\Utils\FileSystemUtil;

class FileSystemUtilTest extends TestCase
{
    /**
     * @test
     */
    public function getConcreteClassNames()
    {
        $this->assertEquals(
            [
                EntryPointA::class,
                "EntryPointB",
                EntryPointC1::class,
                EntryPointC2::class,
                EntryPointD1::class,
                EntryPointD2::class,
            ],
            FileSystemUtil::getClassesInPath(dirname(__DIR__) . "/Fixture/DependencyGraph/EntryPoint", true),
            "",
            0.0,
            10,
            true
        );
    }

    /**
     * @test
     */
    public function getAllClassNames()
    {
        $classes = FileSystemUtil::getClassesInPath(dirname(__DIR__) . "/Fixture/DependencyGraph/EntryPoint", false);

        $this->assertContains(EntryPointEInterface::class, $classes);
        $this->assertContains(EntryPointGAbstract::class, $classes);
    }
}