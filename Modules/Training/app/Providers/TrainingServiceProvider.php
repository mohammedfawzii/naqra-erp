<?php

namespace Modules\Training\Providers;

use Modules\Training\Repositories\FieldTrainingManagement\FieldTrainingManagementRepositoryInterface;
use Modules\Training\Repositories\FieldTrainingManagement\FieldTrainingManagementRepository;

use Modules\Training\Repositories\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationRepositoryInterface;
use Modules\Training\Repositories\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationRepository;

use Modules\Training\Repositories\GamificationForTraining\GamificationForTrainingRepositoryInterface;
use Modules\Training\Repositories\GamificationForTraining\GamificationForTrainingRepository;

use Modules\Training\Repositories\LicensingAndCertificationManagement\LicensingAndCertificationManagementRepositoryInterface;
use Modules\Training\Repositories\LicensingAndCertificationManagement\LicensingAndCertificationManagementRepository;

use Modules\Training\Repositories\TrainingNeedsAssessment\TrainingNeedsAssessmentRepositoryInterface;
use Modules\Training\Repositories\TrainingNeedsAssessment\TrainingNeedsAssessmentRepository;

use Modules\Training\Repositories\ELearningManagement\ELearningManagementRepositoryInterface;
use Modules\Training\Repositories\ELearningManagement\ELearningManagementRepository;

use Modules\Training\Repositories\InternalTrainingManagement\InternalTrainingManagementRepositoryInterface;
use Modules\Training\Repositories\InternalTrainingManagement\InternalTrainingManagementRepository;

use Modules\Training\Repositories\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationRepositoryInterface;
use Modules\Training\Repositories\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationRepository;

use Modules\Training\Repositories\TrainingEvaluation\TrainingEvaluationRepositoryInterface;
use Modules\Training\Repositories\TrainingEvaluation\TrainingEvaluationRepository;

use Modules\Training\Repositories\CertificationManagement\CertificationManagementRepositoryInterface;
use Modules\Training\Repositories\CertificationManagement\CertificationManagementRepository;

use Modules\Training\Repositories\CourseTracking\CourseTrackingRepositoryInterface;
use Modules\Training\Repositories\CourseTracking\CourseTrackingRepository;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class TrainingServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Training';

    protected string $nameLower = 'training';

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
        $this->app->bind(CourseTrackingRepositoryInterface::class, CourseTrackingRepository::class);
        $this->app->bind(CertificationManagementRepositoryInterface::class, CertificationManagementRepository::class);
        $this->app->bind(TrainingEvaluationRepositoryInterface::class, TrainingEvaluationRepository::class);
        $this->app->bind(ExternalLearningPlatformIntegrationRepositoryInterface::class, ExternalLearningPlatformIntegrationRepository::class);
        $this->app->bind(InternalTrainingManagementRepositoryInterface::class, InternalTrainingManagementRepository::class);
        $this->app->bind(ELearningManagementRepositoryInterface::class, ELearningManagementRepository::class);
        $this->app->bind(TrainingNeedsAssessmentRepositoryInterface::class, TrainingNeedsAssessmentRepository::class);
        $this->app->bind(LicensingAndCertificationManagementRepositoryInterface::class, LicensingAndCertificationManagementRepository::class);
        $this->app->bind(GamificationForTrainingRepositoryInterface::class, GamificationForTrainingRepository::class);
        $this->app->bind(AIDrivenLearningRecommendationRepositoryInterface::class, AIDrivenLearningRecommendationRepository::class);
        $this->app->bind(FieldTrainingManagementRepositoryInterface::class, FieldTrainingManagementRepository::class);
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
