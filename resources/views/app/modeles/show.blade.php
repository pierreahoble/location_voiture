@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('modeles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.modeles.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.modeles.inputs.designation')</h5>
                    <span>{{ $modele->designation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.modeles.inputs.description')</h5>
                    <span>{{ $modele->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('modeles.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Modele::class)
                <a href="{{ route('modeles.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
