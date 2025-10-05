<?php

namespace Modules\Facilities\Providers;

use Modules\Facilities\Repositories\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesRepositoryInterface;
use Modules\Facilities\Repositories\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesRepository;

use Modules\Facilities\Repositories\MedicalInsuranceFacilities\MedicalInsuranceFacilitiesRepositoryInterface;
use Modules\Facilities\Repositories\MedicalInsuranceFacilities\MedicalInsuranceFacilitiesRepository;

use Modules\Facilities\Repositories\MedicalInsuranceCategories\MedicalInsuranceCategoriesRepositoryInterface;
use Modules\Facilities\Repositories\MedicalInsuranceCategories\MedicalInsuranceCategoriesRepository;

use Modules\Facilities\Repositories\periodicObligations\periodicObligationsRepositoryInterface;
use Modules\Facilities\Repositories\periodicObligations\periodicObligationsRepository;

use Modules\Facilities\Repositories\SubscriptionFacilities\SubscriptionFacilitiesRepositoryInterface;
use Modules\Facilities\Repositories\SubscriptionFacilities\SubscriptionFacilitiesRepository;

use Modules\Facilities\Repositories\License\LicenseRepositoryInterface;
use Modules\Facilities\Repositories\License\LicenseRepository;

use Modules\Facilities\Repositories\Branches\BranchesRepositoryInterface;
use Modules\Facilities\Repositories\Branches\BranchesRepository;

use Modules\Facilities\Repositories\DigitalFacility\DigitalFacilityRepositoryInterface;
use Modules\Facilities\Repositories\DigitalFacility\DigitalFacilityRepository;

use Modules\Facilities\Repositories\FacilityDigital\FacilityDigitalRepositoryInterface;
use Modules\Facilities\Repositories\FacilityDigital\FacilityDigitalRepository;

use Modules\Facilities\Repositories\FacilityAttachments\FacilityAttachmentsRepositoryInterface;
use Modules\Facilities\Repositories\FacilityAttachments\FacilityAttachmentsRepository;

use Modules\Facilities\Repositories\FacilityFile\FacilityFileRepositoryInterface;
use Modules\Facilities\Repositories\FacilityFile\FacilityFileRepository;

use Modules\Facilities\Repositories\Owner\OwnerRepositoryInterface;
use Modules\Facilities\Repositories\Owner\OwnerRepository;

use Modules\Facilities\Repositories\Facilities\FacilitiesRepositoryInterface;
use Modules\Facilities\Repositories\Facilities\FacilitiesRepository;

use Modules\Facilities\Repositories\Fatama\FatamaRepositoryInterface;
use Modules\Facilities\Repositories\Fatama\FatamaRepository;

use Modules\Facilities\Repositories\User\UserRepositoryInterface;
use Modules\Facilities\Repositories\User\UserRepository;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(FacilitiesRepositoryInterface::class, FacilitiesRepository::class);
        $this->app->bind(OwnerRepositoryInterface::class, OwnerRepository::class);
        $this->app->bind(FacilityFileRepositoryInterface::class, FacilityFileRepository::class);
        $this->app->bind(FacilityAttachmentsRepositoryInterface::class, FacilityAttachmentsRepository::class);
        $this->app->bind(FacilityDigitalRepositoryInterface::class, FacilityDigitalRepository::class);
        $this->app->bind(DigitalFacilityRepositoryInterface::class, DigitalFacilityRepository::class);
        $this->app->bind(BranchesRepositoryInterface::class, BranchesRepository::class);
        $this->app->bind(LicenseRepositoryInterface::class, LicenseRepository::class);
        $this->app->bind(SubscriptionFacilitiesRepositoryInterface::class, SubscriptionFacilitiesRepository::class);
        $this->app->bind(periodicObligationsRepositoryInterface::class, periodicObligationsRepository::class);
        $this->app->bind(MedicalInsuranceCategoriesRepositoryInterface::class, MedicalInsuranceCategoriesRepository::class);
        $this->app->bind(MedicalInsuranceFacilitiesRepositoryInterface::class, MedicalInsuranceFacilitiesRepository::class);
        $this->app->bind(MedicalInsurancesFacilitiesRepositoryInterface::class, MedicalInsurancesFacilitiesRepository::class);
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
