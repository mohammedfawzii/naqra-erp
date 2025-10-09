<?php

namespace Modules\Facilities\Providers;
 
use Modules\Facilities\Repositories\SubscriptionFacilities\SubscriptionFacilitiesRepositoryInterface;
use Modules\Facilities\Repositories\SubscriptionFacilities\SubscriptionFacilitiesRepository;
use Modules\Facilities\Repositories\OwnerForeignCompany\OwnerForeignCompanyRepositoryInterface;
use Modules\Facilities\Repositories\OwnerForeignCompany\OwnerForeignCompanyRepository;
use Modules\Facilities\Repositories\OwnerEndowment\OwnerEndowmentRepositoryInterface;
use Modules\Facilities\Repositories\OwnerEndowment\OwnerEndowmentRepository;
use Modules\Facilities\Repositories\OwnerGulfCompany\OwnerGulfCompanyRepositoryInterface;
use Modules\Facilities\Repositories\OwnerGulfCompany\OwnerGulfCompanyRepository;
use Modules\Facilities\Repositories\OwnerResident\OwnerResidentRepositoryInterface;
use Modules\Facilities\Repositories\OwnerResident\OwnerResidentRepository;
use Modules\Facilities\Repositories\OwnerGulf\OwnerGulfRepositoryInterface;
use Modules\Facilities\Repositories\OwnerGulf\OwnerGulfRepository;

use Modules\Facilities\Repositories\OwnerSaudiIndividual\OwnerSaudiIndividualRepositoryInterface;
use Modules\Facilities\Repositories\OwnerSaudiIndividual\OwnerSaudiIndividualRepository;

use Modules\Facilities\Repositories\OwnerAssociation\OwnerAssociationRepositoryInterface;
use Modules\Facilities\Repositories\OwnerAssociation\OwnerAssociationRepository;

use Modules\Facilities\Repositories\Owner\OwnerRepositoryInterface;
use Modules\Facilities\Repositories\Owner\OwnerRepository;

use Modules\Facilities\Repositories\Branch\BranchRepositoryInterface;
use Modules\Facilities\Repositories\Branch\BranchRepository;

use Modules\Facilities\Repositories\Branches\BranchesRepositoryInterface;
use Modules\Facilities\Repositories\Branches\BranchesRepository;


use Modules\Facilities\Repositories\Facilities\FacilitiesRepositoryInterface;
use Modules\Facilities\Repositories\Facilities\FacilitiesRepository;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\CmsErp\Repositories\MedicalInsurance\MedicalInsuranceRepository;
use Modules\CmsErp\Repositories\MedicalInsurance\MedicalInsuranceRepositoryInterface;
use Modules\Facilities\Repositories\DigitalFacility\DigitalFacilityRepository;
use Modules\Facilities\Repositories\DigitalFacility\DigitalFacilityRepositoryInterface;
use Modules\Facilities\Repositories\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesRepository;
use Modules\Facilities\Repositories\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesRepositoryInterface;
use Modules\Facilities\Repositories\PeriodicObligations\PeriodicObligationsRepository;
use Modules\Facilities\Repositories\PeriodicObligations\PeriodicObligationsRepositoryInterface;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class FacilitiesServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Facilities';

    protected string $nameLower = 'facilities';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
    }

    /**
     * Register the service provider.
     */
    public function register(): void {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->bind(DigitalFacilityRepositoryInterface::class, DigitalFacilityRepository::class);
        $this->app->bind(FacilitiesRepositoryInterface::class, FacilitiesRepository::class);
        $this->app->bind(SubscriptionFacilitiesRepositoryInterface::class,SubscriptionFacilitiesRepository::class);
        $this->app->bind(BranchesRepositoryInterface::class, BranchesRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(OwnerRepositoryInterface::class, OwnerRepository::class);
        $this->app->bind(OwnerAssociationRepositoryInterface::class, OwnerAssociationRepository::class);
        $this->app->bind(OwnerSaudiIndividualRepositoryInterface::class, OwnerSaudiIndividualRepository::class);
        $this->app->bind(OwnerGulfRepositoryInterface::class, OwnerGulfRepository::class);
        $this->app->bind(OwnerResidentRepositoryInterface::class, OwnerResidentRepository::class);
        $this->app->bind(OwnerGulfCompanyRepositoryInterface::class, OwnerGulfCompanyRepository::class);
        $this->app->bind(OwnerEndowmentRepositoryInterface::class, OwnerEndowmentRepository::class);
        $this->app->bind(OwnerForeignCompanyRepositoryInterface::class, OwnerForeignCompanyRepository::class);
        $this->app->bind(PeriodicObligationsRepositoryInterface::class,PeriodicObligationsRepository::class);
         $this->app->bind(MedicalInsurancesFacilitiesRepositoryInterface::class,MedicalInsurancesFacilitiesRepository::class);
   }    

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $configPath = module_path($this->name, config('modules.paths.generator.config.path'));

        if (is_dir($configPath)) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $config = str_replace($configPath.DIRECTORY_SEPARATOR, '', $file->getPathname());
                    $config_key = str_replace([DIRECTORY_SEPARATOR, '.php'], ['.', ''], $config);
                    $segments = explode('.', $this->nameLower.'.'.$config_key);

                    // Remove duplicated adjacent segments
                    $normalized = [];
                    foreach ($segments as $segment) {
                        if (end($normalized) !== $segment) {
                            $normalized[] = $segment;
                        }
                    }

                    $key = ($config === 'config.php') ? $this->nameLower : implode('.', $normalized);

                    $this->publishes([$file->getPathname() => config_path($config)], 'config');
                    $this->merge_config_from($file->getPathname(), $key);
                }
            }
        }
    }

    /**
     * Merge config from the given path recursively.
     */
    protected function merge_config_from(string $path, string $key): void
    {
        $existing = config($key, []);
        $module_config = require $path;

        config([$key => array_replace_recursive($existing, $module_config)]);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        Blade::componentNamespace(config('modules.namespace').'\\' . $this->name . '\\View\\Components', $this->nameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
}
