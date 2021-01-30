<?php


namespace App\Http\Controllers\Backoffice;


use App\Domain\Models\CompanyStatus;
use App\Domain\Repositories\CompanyRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CompanyValidationController extends Controller
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $filters = [
            'company_status_id' => CompanyStatus::pending()->getId()
        ];

        $sortBy = 'created_at';
        $sortSense = 'DESC';

        $paginatedListing = $this->companyRepository->getForListing(
            $filters,
            $sortBy,
            $sortSense
        );

        return View::make('backoffice.list', [
            'listing' => $paginatedListing
        ]);
    }

    public function view(int $id)
    {
        # TODO: Formulario con los datos de la empresa editables
        dd('Formulario con los datos de la empresa editables');
    }

    public function update(int $id)
    {
        # TODO: Actualiza los campos editados y habilita la empresa
        dd('Actualiza los campos editados y habilita la empresa');
    }
}
