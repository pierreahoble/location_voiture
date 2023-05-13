@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('marques.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.marques.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.marques.inputs.designation')</h5>
                    <span>{{ $marque->designation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.marques.inputs.description')</h5>
                    <span>{{ $marque->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('marques.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Marque::class)
                <a href="{{ route('marques.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
