<?php


namespace App\Http\Controllers;


use App\Domain\Models\Country;
use App\Domain\Models\State;
use App\Domain\Repositories\CountryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Response;


class LocationController extends ApplicationController
{
    private CountryRepository $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
        parent::__construct();
    }

    public function states(int $countryId)
    {
        /** @var Country $country */
        $country = $this->countryRepository->getById($countryId);

        if (empty($country)) {
            return Response::json([], 400);
        }

        $response = $this->prepareStateResponse($country);

        return Response::json($response, 200);
    }

    private function prepareStateResponse(Country $country)
    {
        /** @var Collection $states */
        $states = $country->states;
        return $states->map(function (State $state) {
            return [
                'id' => $state->id,
                'name' => $state->name
            ];
        })->toArray();
    }
}
