<?php

namespace Gnugat\CommandBundle\Tests\Composer;

use Gnugat\CommandBundle\Composer\Composer;
use Gnugat\CommandBundle\Composer\Executor;

class ComposerTest extends \PHPUnit_Framework_TestCase
{
    public function testInstallation()
    {
        $packageName = 'author/package';

        $executor = $this->getMock('Gnugat\\CommandBundle\\Composer\\Executor');
        $executor->expects($this->once())
            ->method('execute')
            ->with($this->equalTo('composer require '.$packageName));

        $composer = new Composer($executor);
        $composer->installPackage($packageName);
    }
}
