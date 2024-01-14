<?php

namespace Squipix\LaravelInstaller\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Schema;
class SettingsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        try {
            $installedLogFile = storage_path('installed');
            if (! file_exists($installedLogFile)) {
                return redirect()->to(url('/') . '/install');
            }
            DB::connection()->getPdo();
            if (!(Schema::hasTable('general_settings') || Schema::hasTable('settings'))) {
                if(file_exists($installedLogFile)){
                    @unlink($installedLogFile);
                }
                return redirect()->to(url('/') . '/install');
            }
            return $next($request);
        } catch (\Exception $e) {
            return redirect()->to(url('/') . '/install');
        }
    }
}
