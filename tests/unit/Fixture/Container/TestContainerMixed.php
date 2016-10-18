<?php
namespace WoohooLabs\Dicone\Tests\Unit\Fixture\Container;

use \WoohooLabs\Dicone\AbstractContainer;

class TestContainerMixed extends AbstractContainer
{
    protected function getItems(): array
    {
        return [
            'WoohooLabs\Dicone\Tests\Unit\Fixture\Container\TestContainerEmpty' => function () {
                return $this;
            },
            'WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\Entrypoint\EntrypointA' => function () {
                static $item = null;

                if ($item === null) {
                    $item = new \WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\Entrypoint\EntrypointA(
                        $this->getItem('WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\ClassD')
                    );
                }

                return $item;
            },
            'WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\ClassD' => function () {
                static $item = null;

                if ($item === null) {
                    $item = new \WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\ClassD(
                    );
                }

                return $item;
            },
            'WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\Entrypoint\Sub\EntrypointB' => function () {
                static $item = null;

                if ($item === null) {
                    $item = new \WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\Entrypoint\Sub\EntrypointB(
                    );

                    $reflectionObject = new \ReflectionObject($item);
                    $this->setPropertyValue($reflectionObject, 'c', 'WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\ClassC');
                }

                return $item;
            },
            'WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\ClassC' => function () {
                $item = new \WoohooLabs\Dicone\Tests\Unit\Fixture\DependencyGraph\Container\ClassC(
                );

                return $item;
            },
        ];
    }
}