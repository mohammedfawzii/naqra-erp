<?php

namespace Modules\Payroll\Providers;

use Modules\Payroll\Repositories\ChatbotforPayroll\ChatbotforPayrollRepositoryInterface;
use Modules\Payroll\Repositories\ChatbotforPayroll\ChatbotforPayrollRepository;

use Modules\Payroll\Repositories\MultiCountryPayroll\MultiCountryPayrollRepositoryInterface;
use Modules\Payroll\Repositories\MultiCountryPayroll\MultiCountryPayrollRepository;

use Modules\Payroll\Repositories\EndofServiceCalculationscls\EndofServiceCalculationsclsRepositoryInterface;
use Modules\Payroll\Repositories\EndofServiceCalculationscls\EndofServiceCalculationsclsRepository;

use Modules\Payroll\Repositories\EndofServiceCalculations\EndofServiceCalculationsRepositoryInterface;
use Modules\Payroll\Repositories\EndofServiceCalculations\EndofServiceCalculationsRepository;

use Modules\Payroll\Repositories\LoanType\LoanTypeRepositoryInterface;
use Modules\Payroll\Repositories\LoanType\LoanTypeRepository;

use Modules\Payroll\Repositories\LoanDeductions\LoanDeductionsRepositoryInterface;
use Modules\Payroll\Repositories\LoanDeductions\LoanDeductionsRepository;

use Modules\Payroll\Repositories\PaidLeaveManagement\PaidLeaveManagementRepositoryInterface;
use Modules\Payroll\Repositories\PaidLeaveManagement\PaidLeaveManagementRepository;

use Modules\Payroll\Repositories\PayrollAnalytics\PayrollAnalyticsRepositoryInterface;
use Modules\Payroll\Repositories\PayrollAnalytics\PayrollAnalyticsRepository;

use Modules\Payroll\Repositories\PayrollProfile\PayrollProfileRepositoryInterface;
use Modules\Payroll\Repositories\PayrollProfile\PayrollProfileRepository;

use Modules\Payroll\Repositories\BenefitEmployee\BenefitEmployeeRepositoryInterface;
use Modules\Payroll\Repositories\BenefitEmployee\BenefitEmployeeRepository;

use Modules\Payroll\Repositories\BenefitType\BenefitTypeRepositoryInterface;
use Modules\Payroll\Repositories\BenefitType\BenefitTypeRepository;

use Modules\Payroll\Repositories\AttendanceManagement\AttendanceManagementRepositoryInterface;
use Modules\Payroll\Repositories\AttendanceManagement\AttendanceManagementRepository;

use Modules\Payroll\Repositories\EmployeePaymentManagement\EmployeePaymentManagementRepositoryInterface;
use Modules\Payroll\Repositories\EmployeePaymentManagement\EmployeePaymentManagementRepository;

use Modules\Payroll\Repositories\PayrollManagement\PayrollManagementRepositoryInterface;
use Modules\Payroll\Repositories\PayrollManagement\PayrollManagementRepository;

use Modules\Payroll\Repositories\PayrollReport\PayrollReportRepositoryInterface;
use Modules\Payroll\Repositories\PayrollReport\PayrollReportRepository;

use Modules\Payroll\Repositories\TaxDeduction\TaxDeductionRepositoryInterface;
use Modules\Payroll\Repositories\TaxDeduction\TaxDeductionRepository;

use Modules\Payroll\Repositories\TaxDeductionType\TaxDeductionTypeRepositoryInterface;
use Modules\Payroll\Repositories\TaxDeductionType\TaxDeductionTypeRepository;

use Modules\Payroll\Repositories\TaxDeductionStatus\TaxDeductionStatusRepositoryInterface;
use Modules\Payroll\Repositories\TaxDeductionStatus\TaxDeductionStatusRepository;

use Modules\Payroll\Repositories\IncentiveStatus\IncentiveStatusRepositoryInterface;
use Modules\Payroll\Repositories\IncentiveStatus\IncentiveStatusRepository;

use Modules\Payroll\Repositories\IncentiveType\IncentiveTypeRepositoryInterface;
use Modules\Payroll\Repositories\IncentiveType\IncentiveTypeRepository;

use Modules\Payroll\Repositories\Incentive\IncentiveRepositoryInterface;
use Modules\Payroll\Repositories\Incentive\IncentiveRepository;

use Modules\Payroll\Repositories\Payroll\PayrollRepositoryInterface;
use Modules\Payroll\Repositories\Payroll\PayrollRepository;

use Modules\Payroll\Repositories\PayrollAttachment\PayrollAttachmentRepositoryInterface;
use Modules\Payroll\Repositories\PayrollAttachment\PayrollAttachmentRepository;

use Modules\Payroll\Repositories\PayrollAttachments\PayrollAttachmentsRepositoryInterface;
use Modules\Payroll\Repositories\PayrollAttachments\PayrollAttachmentsRepository;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class PayrollServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Payroll';

    protected string $nameLower = 'payroll';

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
        $this->app->bind(PayrollAttachmentsRepositoryInterface::class, PayrollAttachmentsRepository::class);
        $this->app->bind(PayrollAttachmentRepositoryInterface::class, PayrollAttachmentRepository::class);
        $this->app->bind(PayrollRepositoryInterface::class, PayrollRepository::class);
        $this->app->bind(IncentiveRepositoryInterface::class, IncentiveRepository::class);
        $this->app->bind(IncentiveTypeRepositoryInterface::class, IncentiveTypeRepository::class);
        $this->app->bind(IncentiveStatusRepositoryInterface::class, IncentiveStatusRepository::class);
        $this->app->bind(TaxDeductionStatusRepositoryInterface::class, TaxDeductionStatusRepository::class);
        $this->app->bind(TaxDeductionTypeRepositoryInterface::class, TaxDeductionTypeRepository::class);
        $this->app->bind(TaxDeductionRepositoryInterface::class, TaxDeductionRepository::class);
        $this->app->bind(PayrollReportRepositoryInterface::class, PayrollReportRepository::class);
        $this->app->bind(PayrollManagementRepositoryInterface::class, PayrollManagementRepository::class);
        $this->app->bind(EmployeePaymentManagementRepositoryInterface::class, EmployeePaymentManagementRepository::class);
        $this->app->bind(AttendanceManagementRepositoryInterface::class, AttendanceManagementRepository::class);
        $this->app->bind(BenefitTypeRepositoryInterface::class, BenefitTypeRepository::class);
        $this->app->bind(BenefitEmployeeRepositoryInterface::class, BenefitEmployeeRepository::class);
        $this->app->bind(PayrollProfileRepositoryInterface::class, PayrollProfileRepository::class);
        $this->app->bind(PayrollAnalyticsRepositoryInterface::class, PayrollAnalyticsRepository::class);
        $this->app->bind(PaidLeaveManagementRepositoryInterface::class, PaidLeaveManagementRepository::class);
        $this->app->bind(LoanDeductionsRepositoryInterface::class, LoanDeductionsRepository::class);
        $this->app->bind(LoanTypeRepositoryInterface::class, LoanTypeRepository::class);
        $this->app->bind(EndofServiceCalculationsRepositoryInterface::class, EndofServiceCalculationsRepository::class);
        $this->app->bind(EndofServiceCalculationsclsRepositoryInterface::class, EndofServiceCalculationsclsRepository::class);
        $this->app->bind(MultiCountryPayrollRepositoryInterface::class, MultiCountryPayrollRepository::class);
        $this->app->bind(ChatbotforPayrollRepositoryInterface::class, ChatbotforPayrollRepository::class);
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
