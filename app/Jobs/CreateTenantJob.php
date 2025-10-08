<?php

namespace App\Jobs;

use App\Models\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;

    public function __construct($name,protected $user_id)
    {
        $this->name = $name;
    }

    public function handle()
    {
        try {
            $dbName = 'tenant_' . strtolower($this->name) . '_' . time();

            $tenant = Tenant::create([
                'name' => $this->name,
                'db_name' => $dbName,
                'user_id' => $this->user_id,
            ]);

            DB::statement("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

            $modules = config('modulesDb', []);
            if (empty($modules)) {
                return $tenant;
            }

            foreach ($modules as $moduleName => $settings) {
                $config = config('database.connections.mysql');
                $config['database'] = $dbName;
                Config::set('database.connections.tenant', $config);

                if (!File::exists($settings['path'])) {
                    continue;
                }

                $migrationFiles = collect(File::allFiles($settings['path']))
                    ->reject(fn($file) => str_contains($file->getPathname(), 'System'))
                    ->map(fn($file) => str_replace(base_path() . '/', '', $file->getPathname()))
                    ->toArray();

                foreach ($migrationFiles as $path) {
                    try {
                        Artisan::call('migrate', [
                            '--database' => 'tenant',
                            '--path' => $path,
                            '--force' => true,
                        ]);
                    } catch (\Exception $e) {
                        // Ignore individual migration failures
                    }
                }
            }

            return $tenant;

        } catch (\Exception $e) {
            // Ignore job failure
        }
    }
}
