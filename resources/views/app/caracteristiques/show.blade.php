@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('caracteristiques.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.caracteristiques.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.caracteristiques.inputs.designation')</h5>
                    <span>{{ $caracteristique->designation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caracteristiques.inputs.valeur')</h5>
                    <span>{{ $caracteristique->valeur ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caracteristiques.inputs.bien_id')</h5>
                    <span
                        >{{ optional($caracteristique->bien)->designation ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('caracteristiques.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Caracteristique::class)
                <a
                    href="{{ route('caracteristiques.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
