@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('biens.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.biens.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.designation')</h5>
                    <span>{{ $bien->designation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.email')</h5>
                    <span>{{ $bien->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.telephone')</h5>
                    <span>{{ $bien->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.immatriculation')</h5>
                    <span>{{ $bien->immatriculation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.prix_jour')</h5>
                    <span>{{ $bien->prix_jour ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.annee')</h5>
                    <span>{{ $bien->annee ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.couleur')</h5>
                    <span>{{ $bien->couleur ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.type_consomation')</h5>
                    <span>{{ $bien->type_consomation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.transmission')</h5>
                    <span>{{ $bien->transmission ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.conso_sur_cent')</h5>
                    <span>{{ $bien->conso_sur_cent ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.moteur')</h5>
                    <span>{{ $bien->moteur ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.Nbre_porte')</h5>
                    <span>{{ $bien->Nbre_porte ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.Nbre_place')</h5>
                    <span>{{ $bien->Nbre_place ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.Description')</h5>
                    <span>{{ $bien->Description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.type_id')</h5>
                    <span>{{ optional($bien->type)->designation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.gerant_id')</h5>
                    <span>{{ optional($bien->user)->nom_prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.modele_id')</h5>
                    <span
                        >{{ optional($bien->modele)->designation ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.biens.inputs.marque_id')</h5>
                    <span
                        >{{ optional($bien->marque)->designation ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('biens.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Bien::class)
                <a href="{{ route('biens.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
