<?php

namespace Modules\CmsErp\Providers;

use Modules\CmsErp\Repositories\Attendance\AttendanceRepositoryInterface;
use Modules\CmsErp\Repositories\Attendance\AttendanceRepository;

use Modules\CmsErp\Repositories\Bank\BankRepositoryInterface;
use Modules\CmsErp\Repositories\Bank\BankRepository;

use Modules\CmsErp\Repositories\PaymentMethod\PaymentMethodRepositoryInterface;
use Modules\CmsErp\Repositories\PaymentMethod\PaymentMethodRepository;

use Modules\CmsErp\Repositories\SubscriptionType\SubscriptionTypeRepositoryInterface;
use Modules\CmsErp\Repositories\SubscriptionType\SubscriptionTypeRepository;

use Modules\CmsErp\Repositories\LicenseType\LicenseTypeRepositoryInterface;
use Modules\CmsErp\Repositories\LicenseType\LicenseTypeRepository;

use Modules\CmsErp\Repositories\Religion\ReligionRepositoryInterface;
use Modules\CmsErp\Repositories\Religion\ReligionRepository;

use Modules\CmsErp\Repositories\City\CityRepositoryInterface;
use Modules\CmsErp\Repositories\City\CityRepository;

use Modules\CmsErp\Repositories\Country\CountryRepositoryInterface;
use Modules\CmsErp\Repositories\Country\CountryRepository;

use Modules\CmsErp\Repositories\ActivitySpecific\ActivitySpecificRepositoryInterface;
use Modules\CmsErp\Repositories\ActivitySpecific\ActivitySpecificRepository;

use Modules\CmsErp\Repositories\ActivityPrivate\ActivityPrivateRepositoryInterface;
use Modules\CmsErp\Repositories\ActivityPrivate\ActivityPrivateRepository;

use Modules\CmsErp\Repositories\ActivityGeneral\ActivityGeneralRepositoryInterface;
use Modules\CmsErp\Repositories\ActivityGeneral\ActivityGeneralRepository;

use Modules\CmsErp\Repositories\Language\LanguageRepositoryInterface;
use Modules\CmsErp\Repositories\Language\LanguageRepository;

use Modules\CmsErp\Repositories\Nationality\NationalityRepositoryInterface;
use Modules\CmsErp\Repositories\Nationality\NationalityRepository;

use Modules\CmsErp\Repositories\TrialPeriod\TrialPeriodRepositoryInterface;
use Modules\CmsErp\Repositories\TrialPeriod\TrialPeriodRepository;

use Modules\CmsErp\Repositories\Subscription\SubscriptionRepositoryInterface;
use Modules\CmsErp\Repositories\Subscription\SubscriptionRepository;

use Modules\CmsErp\Repositories\SalaryType\SalaryTypeRepositoryInterface;
use Modules\CmsErp\Repositories\SalaryType\SalaryTypeRepository;

use Modules\CmsErp\Repositories\Relationship\RelationshipRepositoryInterface;
use Modules\CmsErp\Repositories\Relationship\RelationshipRepository;

use Modules\CmsErp\Repositories\Position\PositionRepositoryInterface;
use Modules\CmsErp\Repositories\Position\PositionRepository;

use Modules\CmsErp\Repositories\OwnershipType\OwnershipTypeRepositoryInterface;
use Modules\CmsErp\Repositories\OwnershipType\OwnershipTypeRepository;

use Modules\CmsErp\Repositories\NoticePeriod\NoticePeriodRepositoryInterface;
use Modules\CmsErp\Repositories\NoticePeriod\NoticePeriodRepository;

use Modules\CmsErp\Repositories\Ministry\MinistryRepositoryInterface;
use Modules\CmsErp\Repositories\Ministry\MinistryRepository;

use Modules\CmsErp\Repositories\MedicalInsuranceCategorie\MedicalInsuranceCategorieRepositoryInterface;
use Modules\CmsErp\Repositories\MedicalInsuranceCategorie\MedicalInsuranceCategorieRepository;

use Modules\CmsErp\Repositories\MedicalInsurance\MedicalInsuranceRepositoryInterface;
use Modules\CmsErp\Repositories\MedicalInsurance\MedicalInsuranceRepository;

use Modules\CmsErp\Repositories\MaritalStatus\MaritalStatusRepositoryInterface;
use Modules\CmsErp\Repositories\MaritalStatus\MaritalStatusRepository;

use Modules\CmsErp\Repositories\HolidaysList\HolidaysListRepositoryInterface;
use Modules\CmsErp\Repositories\HolidaysList\HolidaysListRepository;

use Modules\CmsErp\Repositories\HolidayList\HolidayListRepositoryInterface;
use Modules\CmsErp\Repositories\HolidayList\HolidayListRepository;

use Modules\CmsErp\Repositories\Headquarter\HeadquarterRepositoryInterface;
use Modules\CmsErp\Repositories\Headquarter\HeadquarterRepository;

use Modules\CmsErp\Repositories\EmployeeStatu\EmployeeStatuRepositoryInterface;
use Modules\CmsErp\Repositories\EmployeeStatu\EmployeeStatuRepository;

use Modules\CmsErp\Repositories\EducationalLevel\EducationalLevelRepositoryInterface;
use Modules\CmsErp\Repositories\EducationalLevel\EducationalLevelRepository;

use Modules\CmsErp\Repositories\Currency\CurrencyRepositoryInterface;
use Modules\CmsErp\Repositories\Currency\CurrencyRepository;

use Modules\CmsErp\Repositories\CompanyType\CompanyTypeRepositoryInterface;
use Modules\CmsErp\Repositories\CompanyType\CompanyTypeRepository;

use Modules\CmsErp\Repositories\CompanyHeadquarter\CompanyHeadquarterRepositoryInterface;
use Modules\CmsErp\Repositories\CompanyHeadquarter\CompanyHeadquarterRepository;

use Modules\CmsErp\Repositories\CompanyActivity\CompanyActivityRepositoryInterface;
use Modules\CmsErp\Repositories\CompanyActivity\CompanyActivityRepository;

use Modules\CmsErp\Repositories\BloodType\BloodTypeRepositoryInterface;
use Modules\CmsErp\Repositories\BloodType\BloodTypeRepository;

use Modules\CmsErp\Repositories\AuthorizedforExpenseApproval\AuthorizedforExpenseApprovalRepositoryInterface;
use Modules\CmsErp\Repositories\AuthorizedforExpenseApproval\AuthorizedforExpenseApprovalRepository;

use Modules\CmsErp\Repositories\Allowance\AllowanceRepositoryInterface;
use Modules\CmsErp\Repositories\Allowance\AllowanceRepository;

use Modules\CmsErp\Repositories\SecurityQuestions\SecurityQuestionsRepositoryInterface;
use Modules\CmsErp\Repositories\SecurityQuestions\SecurityQuestionsRepository;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class CmsErpServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'CmsErp';

    protected string $nameLower = 'cmserp';

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
        $this->app->bind(SecurityQuestionsRepositoryInterface::class, SecurityQuestionsRepository::class);
        $this->app->bind(AllowanceRepositoryInterface::class, AllowanceRepository::class);
        $this->app->bind(AuthorizedforExpenseApprovalRepositoryInterface::class, AuthorizedforExpenseApprovalRepository::class);
        $this->app->bind(BloodTypeRepositoryInterface::class, BloodTypeRepository::class);
        $this->app->bind(CompanyActivityRepositoryInterface::class, CompanyActivityRepository::class);
        $this->app->bind(CompanyHeadquarterRepositoryInterface::class, CompanyHeadquarterRepository::class);
        $this->app->bind(CompanyTypeRepositoryInterface::class, CompanyTypeRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(EducationalLevelRepositoryInterface::class, EducationalLevelRepository::class);
        $this->app->bind(EmployeeStatuRepositoryInterface::class, EmployeeStatuRepository::class);
        $this->app->bind(HeadquarterRepositoryInterface::class, HeadquarterRepository::class);
        $this->app->bind(HolidayListRepositoryInterface::class, HolidayListRepository::class);
        $this->app->bind(HolidaysListRepositoryInterface::class, HolidaysListRepository::class);
        $this->app->bind(MaritalStatusRepositoryInterface::class, MaritalStatusRepository::class);
        $this->app->bind(MedicalInsuranceRepositoryInterface::class, MedicalInsuranceRepository::class);
        $this->app->bind(MedicalInsuranceCategorieRepositoryInterface::class, MedicalInsuranceCategorieRepository::class);
        $this->app->bind(MinistryRepositoryInterface::class, MinistryRepository::class);
        $this->app->bind(NoticePeriodRepositoryInterface::class, NoticePeriodRepository::class);
        $this->app->bind(OwnershipTypeRepositoryInterface::class, OwnershipTypeRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, PositionRepository::class);
        $this->app->bind(RelationshipRepositoryInterface::class, RelationshipRepository::class);
        $this->app->bind(SalaryTypeRepositoryInterface::class, SalaryTypeRepository::class);
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
        $this->app->bind(TrialPeriodRepositoryInterface::class, TrialPeriodRepository::class);
        $this->app->bind(NationalityRepositoryInterface::class, NationalityRepository::class);
        $this->app->bind(LanguageRepositoryInterface::class, LanguageRepository::class);
        $this->app->bind(ActivityGeneralRepositoryInterface::class, ActivityGeneralRepository::class);
        $this->app->bind(ActivityPrivateRepositoryInterface::class, ActivityPrivateRepository::class);
        $this->app->bind(ActivitySpecificRepositoryInterface::class, ActivitySpecificRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(ReligionRepositoryInterface::class, ReligionRepository::class);
        $this->app->bind(LicenseTypeRepositoryInterface::class, LicenseTypeRepository::class);
        $this->app->bind(SubscriptionTypeRepositoryInterface::class, SubscriptionTypeRepository::class);
        $this->app->bind(PaymentMethodRepositoryInterface::class, PaymentMethodRepository::class);
        $this->app->bind(BankRepositoryInterface::class, BankRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
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
