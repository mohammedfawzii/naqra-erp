<?php

namespace Modules\Performance\Providers;

use Modules\Performance\Repositories\LearningManagementIntegration\LearningManagementIntegrationRepositoryInterface;
use Modules\Performance\Repositories\LearningManagementIntegration\LearningManagementIntegrationRepository;

use Modules\Performance\Repositories\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightRepositoryInterface;
use Modules\Performance\Repositories\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightRepository;

use Modules\Performance\Repositories\EmployeeRecognitionManagement\EmployeeRecognitionManagementRepositoryInterface;
use Modules\Performance\Repositories\EmployeeRecognitionManagement\EmployeeRecognitionManagementRepository;

use Modules\Performance\Repositories\ContinuousPerformanceManagement\ContinuousPerformanceManagementRepositoryInterface;
use Modules\Performance\Repositories\ContinuousPerformanceManagement\ContinuousPerformanceManagementRepository;

use Modules\Performance\Repositories\CompetencyManagement\CompetencyManagementRepositoryInterface;
use Modules\Performance\Repositories\CompetencyManagement\CompetencyManagementRepository;

use Modules\Performance\Repositories\SuccessionPlanning\SuccessionPlanningRepositoryInterface;
use Modules\Performance\Repositories\SuccessionPlanning\SuccessionPlanningRepository;

use Modules\Performance\Repositories\PromotionReward\PromotionRewardRepositoryInterface;
use Modules\Performance\Repositories\PromotionReward\PromotionRewardRepository;

use Modules\Performance\Repositories\Feedback360\Feedback360RepositoryInterface;
use Modules\Performance\Repositories\Feedback360\Feedback360Repository;

use Modules\Performance\Repositories\DevelopmentPlan\DevelopmentPlanRepositoryInterface;
use Modules\Performance\Repositories\DevelopmentPlan\DevelopmentPlanRepository;

use Modules\Performance\Repositories\Feedback\FeedbackRepositoryInterface;
use Modules\Performance\Repositories\Feedback\FeedbackRepository;

use Modules\Performance\Repositories\Evaluation\EvaluationRepositoryInterface;
use Modules\Performance\Repositories\Evaluation\EvaluationRepository;

use Modules\Performance\Repositories\Goal\GoalRepositoryInterface;
use Modules\Performance\Repositories\Goal\GoalRepository;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class PerformanceServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Performance';

    protected string $nameLower = 'performance';

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
        $this->app->bind(GoalRepositoryInterface::class, GoalRepository::class);
        $this->app->bind(EvaluationRepositoryInterface::class, EvaluationRepository::class);
        $this->app->bind(FeedbackRepositoryInterface::class, FeedbackRepository::class);
        $this->app->bind(DevelopmentPlanRepositoryInterface::class, DevelopmentPlanRepository::class);
        $this->app->bind(Feedback360RepositoryInterface::class, Feedback360Repository::class);
        $this->app->bind(PromotionRewardRepositoryInterface::class, PromotionRewardRepository::class);
        $this->app->bind(SuccessionPlanningRepositoryInterface::class, SuccessionPlanningRepository::class);
        $this->app->bind(CompetencyManagementRepositoryInterface::class, CompetencyManagementRepository::class);
        $this->app->bind(ContinuousPerformanceManagementRepositoryInterface::class, ContinuousPerformanceManagementRepository::class);
        $this->app->bind(EmployeeRecognitionManagementRepositoryInterface::class, EmployeeRecognitionManagementRepository::class);
        $this->app->bind(AiDrivenPerformanceInsightRepositoryInterface::class, AiDrivenPerformanceInsightRepository::class);
        $this->app->bind(LearningManagementIntegrationRepositoryInterface::class, LearningManagementIntegrationRepository::class);
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
