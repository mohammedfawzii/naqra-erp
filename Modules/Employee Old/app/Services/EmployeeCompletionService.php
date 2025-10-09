<?php

namespace Modules\Employee\Services;

use Modules\Employee\Repositories\EmployeePageCompletion\EmployeePageCompletionRepositoryInterface;

class EmployeeCompletionService
{
    public function __construct(protected EmployeePageCompletionRepositoryInterface $employeePageCompletion) {}


    public function calculatePercentage(array $validatedData, array $rules): float
    {
        $totalFields  = count($rules);
        $filledFields = count(array_filter($validatedData, fn($value) => !is_null($value)));

        return round(($filledFields / $totalFields) * 100, 2);
    }


    public function syncCompletion($validatedData, $request,$pageName)
    {
        $rules = $request->rules();

        $completionPercentage = $this->calculatePercentage($validatedData, $rules);

        $record = $this->employeePageCompletion->findByPageEmployee(
            $validatedData['employee_id'],
            $pageName,
        );

        if ($record) {
            $record->update([
                'completion_percentage' => $completionPercentage,
            ]);
        } else {
         $this->employeePageCompletion->create([
            'employee_id'           => $validatedData['employee_id'],
            'page_name'             => $pageName,
            'completion_percentage' => $completionPercentage,
        ]);        }
    }
}
