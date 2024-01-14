<?php

namespace Squipix\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Squipix\LaravelInstaller\Events\LaravelInstallerFinished;
use Squipix\LaravelInstaller\Helpers\EnvironmentManager;
use Squipix\LaravelInstaller\Helpers\FinalInstallManager;
use Squipix\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Squipix\LaravelInstaller\Helpers\InstalledFileManager $fileManager
     * @param \Squipix\LaravelInstaller\Helpers\FinalInstallManager $finalInstall
     * @param \Squipix\LaravelInstaller\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent(); 
        event(new LaravelInstallerFinished);
        return view('installer::finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
