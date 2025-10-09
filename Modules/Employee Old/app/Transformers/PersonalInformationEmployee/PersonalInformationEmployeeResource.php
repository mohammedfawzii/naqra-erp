<?php

namespace Modules\Employee\Transformers\PersonalInformationEmployee;

use Modules\Employee\Transformers\BaseResource\BaseResource;

class PersonalInformationEmployeeResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'id' => $resource->id,
            'employee' => $resource->employee?->employee_id ?? null,
            'first_name' => $resource->getTranslation('first_name', app()->getLocale()),
            'second_name' => $resource->getTranslation('second_name', app()->getLocale()),
            'therd_name' => $resource->getTranslation('therd_name', app()->getLocale()),
            'family_name' => $resource->getTranslation('family_name', app()->getLocale()),
            'nationality' => $resource->nationality?->nationality_id ?? null,
            'marital_status' => $resource->marital_status,
            'marriage_date' => $resource->marriage_date,
            'gender' => $resource->gender,
            'birth_date' => $resource->birth_date,
            'place_of_birth' => $resource->place_of_birth,
            'national_id_number' => $resource->national_id_number,
            'national_id_expiry' => $resource->national_id_expiry,
            'religion' => $resource->religion?->religion_id ?? null,
            'passport_type' => $resource->passport_type,
            'passport_number' => $resource->passport_number,
            'passport_issue_date' => $resource->passport_issue_date,
            'passport_expiry_date' => $resource->passport_expiry_date,
            'passport_issue_place' => $resource->passport_issue_place,
            'passport_validity' => $resource->passport_validity,
            'work_card_number' => $resource->work_card_number,
            'work_card_issue_date' => $resource->work_card_issue_date,
            'work_card_expiry_date' => $resource->work_card_expiry_date,
            'work_card_fee' => $resource->work_card_fee,
            'iqama_number' => $resource->iqama_number,
            'iqama_issue_date' => $resource->iqama_issue_date,
            'iqama_expiry_date' => $resource->iqama_expiry_date,
            'iqama_fee' => $resource->iqama_fee,
            'document_type' => $resource->document_type,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
            ],
            $this->timestampsArray()
        );
    }
}
