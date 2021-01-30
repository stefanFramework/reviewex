@extends('backoffice.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">
                        {{ Lang::get('backoffice.companies_list_form.title') }}
                    </h4>
                    <p class="card-category">
                        {{ Lang::get('backoffice.companies_list_form.sub_title') }}
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <nav>
                            <ul class="pagination">
                                @if($listing->currentPage() <= 1)
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            {{ Lang::get('backoffice.general.previous') }}
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $listing->previousPageUrl() }}">
                                            {{ Lang::get('backoffice.general.previous') }}
                                        </a>
                                    </li>
                                @endif

                                <li class="page-item">
                                    <span class="page-link">{{ $listing->currentPage() }}</span>
                                </li>

                                @if($listing->currentPage() == $listing->lastPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            {{ Lang::get('backoffice.general.next') }}
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $listing->nextPageUrl() }}">
                                            {{ Lang::get('backoffice.general.next') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                        <table class="table">
                            <thead class=" text-primary">
                                <th>{{ Lang::get('backoffice.companies_list_form.name_title') }}</th>
                                <th>{{ Lang::get('backoffice.companies_list_form.business_sector_title') }}</th>
                                <th>{{ Lang::get('backoffice.companies_list_form.city_title') }}</th>
                                <th>{{ Lang::get('backoffice.general.actions') }}</th>
                            </thead>
                            <tbody>
                            @foreach($listing->items() as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->businessSector->name }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>
                                        <a href="{{ route('backoffice.companies.view', ['id' => $item->id]) }}">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="{{ route('backoffice.home') }}" class="btn btn-default btn-lg" role="button" aria-disabled="true">
                {{ Lang::get('backoffice.general.back') }}
            </a>
        </div>
    </div>
@endsection
