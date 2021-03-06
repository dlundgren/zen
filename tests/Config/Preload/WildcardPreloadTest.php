<?php
declare(strict_types=1);

namespace WoohooLabs\Zen\Tests\Config\Preload;

use PHPUnit\Framework\TestCase;
use WoohooLabs\Zen\Config\Preload\WildcardPreload;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\AClass;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\AInterface;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\BClass;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\BInterface;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\ClassC;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\ClassD;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\ClassEImplementation;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\ClassFImplementation;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\G;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\InterfaceC;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\InterfaceD;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\InterfaceE;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\InterfaceF;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\InterfaceG;
use WoohooLabs\Zen\Tests\Fixture\DependencyGraph\Wildcard\Subdir\ClassH;
use function dirname;

class WildcardPreloadTest extends TestCase
{
    /**
     * @test
     */
    public function getOnlyConcreteClassNames(): void
    {
        $preload = WildcardPreload::create($this->getSourcePath(), true);

        $classNames = $preload->getClassNames();

        $this->assertEqualsCanonicalizing(
            [
                AClass::class,
                BClass::class,
                ClassC::class,
                ClassD::class,
                ClassEImplementation::class,
                ClassFImplementation::class,
                G::class,
                ClassH::class,
            ],
            $classNames
        );
    }

    /**
     * @test
     */
    public function getClassNames(): void
    {
        $preload = WildcardPreload::create($this->getSourcePath(), false);

        $classNames = $preload->getClassNames();

        $this->assertEqualsCanonicalizing(
            [
                AClass::class,
                AInterface::class,
                BClass::class,
                BInterface::class,
                ClassC::class,
                ClassD::class,
                ClassEImplementation::class,
                ClassFImplementation::class,
                G::class,
                InterfaceC::class,
                InterfaceD::class,
                InterfaceE::class,
                InterfaceF::class,
                InterfaceG::class,
                ClassH::class,
            ],
            $classNames
        );
    }

    private function getSourcePath(): string
    {
        return dirname(__DIR__, 2) . "/Fixture/DependencyGraph/Wildcard";
    }
}
