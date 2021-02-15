<?php


namespace App\Http\Records\Factories;


use App\Domain\Models\Company;
use App\Http\Records\CompanyRecord;

class CompanyRecordFactory
{
    public static function fromModel(Company $company, $tags = []): CompanyRecord
    {
        $companyRecord = new CompanyRecord();
        $companyRecord->name = $company->name;
        $companyRecord->code = $company->code;
        $companyRecord->website = $company->website_url;

        if (!empty($company->businessSector)) {
            $companyRecord->businessSectorId = $company->businessSector->id;
            $companyRecord->businessSector = $company->businessSector->name;
        }

        $companyRecord->state = $company->state->name;
        $companyRecord->city = $company->city;
        $companyRecord->score = $company->score;
        $companyRecord->tags = $tags;

        return $companyRecord;
    }
}
