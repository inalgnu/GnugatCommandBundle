<?php

namespace Gnugat\CommandBundle\Composer;

/**
 * Manages PHP dependencies.
 *
 * @author Loic Chardonnet <loic.chardonnet@gmail.com>
 */
class Composer
{
    /**
     * @param \Gnugat\CommandBundle\Composer\Executor $executor The executor.
     */
    public function __construct(Executor $executor)
    {
        $this->executor = $executor;
    }

    /**
     * Adds the given package to the composer.json file and downloads it
     *
     * @param string $packageName The package name
     */
    public function installPackage($packageName)
    {
        $this->executor->execute('composer require '.$packageName);
    }

    public function getPackage($packageName)
    {
        $rawSchema = file_get_contents('composer.lock');
        $schema = json_decode($rawPackages, true);

        $package = null;
        foreach ($schema['packages'] as $currentPackage) {
            if ($currentPackage['name'] === $packageName) {
                $package = $currentPackage;
                break;
            }
        }

        return $package;
    }
}
