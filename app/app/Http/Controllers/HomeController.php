<?php


namespace App\Http\Controllers;

use Throwable;

use App\Utils\Logger;
use App\Exceptions\ExceptionFormatter;

use App\Domain\Models\Company;
use App\Domain\Repositories\CompanyRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends ApplicationController
{
    private CompanyRepository $companyRespository;

    public function __construct(CompanyRepository $companyRepository)
    {
        parent::__construct();
        $this->companyRespository = $companyRepository;
    }

    public function index()
    {
        return View::make('home');
    }

    public function search(Request $request)
    {
        try {
            $inputData = $request->all();
            $companies = $this->companyRespository->getByTextName($inputData['term']);
            $result = $this->generateResult($companies);
            return Response::json($result, 200);
        } catch (Throwable $ex) {
            Logger::error('search', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }

    private function generateResult(Collection $companies)
    {
        return $companies->map(function (Company $company) {
            return [
                'code' => $company->code,
                'label' => $company->name,
                'value' => $company->name
            ];
        })->toArray();
    }

}
