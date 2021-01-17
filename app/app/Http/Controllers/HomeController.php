<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use App\Domain\Repositories\PhoneLineRepository;
use App\Http\Front\ViewModels\PhoneLineViewModel;

class HomeController extends Controller
{
    private PhoneLineRepository $phoneLineRepository;

    public function __construct(PhoneLineRepository $phoneLineRepository)
    {
        $this->phoneLineRepository = $phoneLineRepository;
    }

    public function index()
    {
        $phoneLines = $this->phoneLineRepository->findAll();
        $phoneLinesVms = $this->buildViewModels($phoneLines);
    
        return View::make('home', [
            'phoneLines' => $phoneLinesVms
        ]);
    }

    private function buildViewModels($phoneLines)
    {
        $vms = [];
        foreach ($phoneLines as $phoneLine) {
            $vm = new PhoneLineViewModel();
            $vm->id = $phoneLine->id;
            $vm->number = $phoneLine->number;
            $vm->country = $phoneLine->country->name;
            $vm->available = $phoneLine->isActive();

            $vms[] = $vm;
        }

        return $vms;
    }
}