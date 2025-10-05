<?php

namespace App\Console\Commands;

use App\Services\ApiRouteService;
use App\Services\ColumnSyncService;
use App\Services\ControllerGenerator;
use App\Services\InfoSyncService;
use App\Services\ModuleSeederService;
use App\Services\ProviderBindService;
use App\Services\RelationSyncService;
use App\Services\RepositoryGenerator;
use App\Services\RequestGenerator;
use App\Services\ResourceGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class CrudGeneratorCommand extends Command
{
protected $signature = 'crud:generate {module} {model} {seed?}';

        protected $description = 'Generate CRUD (Controller, Requests, Resource, Repository) inside an HMVC Module';

        public function handle()
        {
                $module = $this->argument('module');
                $model = $this->argument('model');
                $seeder = $this->argument('seed') ?? 'True';



                 RepositoryGenerator::generate($module, $model);
                // Generate Request Validation
                RequestGenerator::make($module, $model);
                // Generate Controller
                ControllerGenerator::make($module, $model);
                // Generate Resource
                ResourceGenerator::make($module, $model);
                // Generate Api Resource
                ApiRouteService::make($module, $model);
                // Generate Bind Repository
                ProviderBindService::make($module, $model);


                // Sync Columns
                ColumnSyncService::make($module, $model);
                // infoSyncService
                InfoSyncService::make($module, $model);



                // Generate Seeder
                ModuleSeederService::make($module, $model);



                $this->info("CRUD generated for {$model} inside Module {$module}");

                Artisan::call('optimize');
                $this->info("Artisan optimize executed successfully.");
                $this->info('Artisan optimize executed successfully.');

                // Sync Info
                InfoSyncService::make($module, $model);
                // RelationSyncService::make($module, $model);

                $this->info("CRUD generated for {$model} inside Module {$module}");

                Artisan::call('optimize');
                $this->info("Artisan optimize executed successfully.");
        }
}
