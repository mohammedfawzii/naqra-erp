<?php

namespace Modules\AttendanceTracking\Providers;

use Modules\AttendanceTracking\Repositories\FlexibleLeaveManagement\FlexibleLeaveManagementRepositoryInterface;
use Modules\AttendanceTracking\Repositories\FlexibleLeaveManagement\FlexibleLeaveManagementRepository;

use Modules\AttendanceTracking\Repositories\GamificationAttendance\GamificationAttendanceRepositoryInterface;
use Modules\AttendanceTracking\Repositories\GamificationAttendance\GamificationAttendanceRepository;

use Modules\AttendanceTracking\Repositories\AiAttendanceInsight\AiAttendanceInsightRepositoryInterface;
use Modules\AttendanceTracking\Repositories\AiAttendanceInsight\AiAttendanceInsightRepository;

use Modules\AttendanceTracking\Repositories\AiAttendanceInsights\AiAttendanceInsightsRepositoryInterface;
use Modules\AttendanceTracking\Repositories\AiAttendanceInsights\AiAttendanceInsightsRepository;

use Modules\AttendanceTracking\Repositories\AbsenceAnalytics\AbsenceAnalyticsRepositoryInterface;
use Modules\AttendanceTracking\Repositories\AbsenceAnalytics\AbsenceAnalyticsRepository;

use Modules\AttendanceTracking\Repositories\RemoteAttendance\RemoteAttendanceRepositoryInterface;
use Modules\AttendanceTracking\Repositories\RemoteAttendance\RemoteAttendanceRepository;

use Modules\AttendanceTracking\Repositories\LeavePolicy\LeavePolicyRepositoryInterface;
use Modules\AttendanceTracking\Repositories\LeavePolicy\LeavePolicyRepository;

use Modules\AttendanceTracking\Repositories\BiometricIntegration\BiometricIntegrationRepositoryInterface;
use Modules\AttendanceTracking\Repositories\BiometricIntegration\BiometricIntegrationRepository;

use Modules\AttendanceTracking\Repositories\TimeTrackingIntegration\TimeTrackingIntegrationRepositoryInterface;
use Modules\AttendanceTracking\Repositories\TimeTrackingIntegration\TimeTrackingIntegrationRepository;

use Modules\AttendanceTracking\Repositories\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceRepositoryInterface;
use Modules\AttendanceTracking\Repositories\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceRepository;

use Modules\AttendanceTracking\Repositories\AttendanceCompliance\AttendanceComplianceRepositoryInterface;
use Modules\AttendanceTracking\Repositories\AttendanceCompliance\AttendanceComplianceRepository;

use Modules\AttendanceTracking\Repositories\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsRepositoryInterface;
use Modules\AttendanceTracking\Repositories\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsRepository;

use Modules\AttendanceTracking\Repositories\ShiftSchedule\ShiftScheduleRepositoryInterface;
use Modules\AttendanceTracking\Repositories\ShiftSchedule\ShiftScheduleRepository;

use Modules\AttendanceTracking\Repositories\LeaveBalance\LeaveBalanceRepositoryInterface;
use Modules\AttendanceTracking\Repositories\LeaveBalance\LeaveBalanceRepository;

use Modules\AttendanceTracking\Repositories\LeaveRequest\LeaveRequestRepositoryInterface;
use Modules\AttendanceTracking\Repositories\LeaveRequest\LeaveRequestRepository;

use Modules\AttendanceTracking\Repositories\AttendanceTracking\AttendanceTrackingRepositoryInterface;
use Modules\AttendanceTracking\Repositories\AttendanceTracking\AttendanceTrackingRepository;

use Modules\AttendanceTracking\Repositories\Test\TestRepositoryInterface;
use Modules\AttendanceTracking\Repositories\Test\TestRepository;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class AttendanceTrackingServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'AttendanceTracking';

    protected string $nameLower = 'attendancetracking';

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
        $this->app->bind(TestRepositoryInterface::class, TestRepository::class);
        $this->app->bind(AttendanceTrackingRepositoryInterface::class, AttendanceTrackingRepository::class);
        $this->app->bind(LeaveRequestRepositoryInterface::class, LeaveRequestRepository::class);
        $this->app->bind(LeaveBalanceRepositoryInterface::class, LeaveBalanceRepository::class);
        $this->app->bind(ShiftScheduleRepositoryInterface::class, ShiftScheduleRepository::class);
        $this->app->bind(AttendanceLeaveAnalyticsRepositoryInterface::class, AttendanceLeaveAnalyticsRepository::class);
        $this->app->bind(AttendanceComplianceRepositoryInterface::class, AttendanceComplianceRepository::class);
        $this->app->bind(EmployeeLeaveSelfServiceRepositoryInterface::class, EmployeeLeaveSelfServiceRepository::class);
        $this->app->bind(TimeTrackingIntegrationRepositoryInterface::class, TimeTrackingIntegrationRepository::class);
        $this->app->bind(BiometricIntegrationRepositoryInterface::class, BiometricIntegrationRepository::class);
        $this->app->bind(LeavePolicyRepositoryInterface::class, LeavePolicyRepository::class);
        $this->app->bind(RemoteAttendanceRepositoryInterface::class, RemoteAttendanceRepository::class);
        $this->app->bind(AbsenceAnalyticsRepositoryInterface::class, AbsenceAnalyticsRepository::class);
        $this->app->bind(AiAttendanceInsightsRepositoryInterface::class, AiAttendanceInsightsRepository::class);
        $this->app->bind(AiAttendanceInsightRepositoryInterface::class, AiAttendanceInsightRepository::class);
        $this->app->bind(GamificationAttendanceRepositoryInterface::class, GamificationAttendanceRepository::class);
        $this->app->bind(FlexibleLeaveManagementRepositoryInterface::class, FlexibleLeaveManagementRepository::class);
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
