@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.biens.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Bien::class)
                        <a
                            href="{{ route('biens.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.biens.inputs.designation')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.immatriculation')
                            </th>
                            <th class="text-right">
                                @lang('crud.biens.inputs.prix_jour')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.annee')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.couleur')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.type_consomation')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.transmission')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.conso_sur_cent')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.moteur')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.Nbre_porte')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.Nbre_place')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.Description')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.type_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.gerant_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.modele_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.biens.inputs.marque_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($biens as $bien)
                        <tr>
                            <td>{{ $bien->designation ?? '-' }}</td>
                            <td>{{ $bien->email ?? '-' }}</td>
                            <td>{{ $bien->telephone ?? '-' }}</td>
                            <td>{{ $bien->immatriculation ?? '-' }}</td>
                            <td>{{ $bien->prix_jour ?? '-' }}</td>
                            <td>{{ $bien->annee ?? '-' }}</td>
                            <td>{{ $bien->couleur ?? '-' }}</td>
                            <td>{{ $bien->type_consomation ?? '-' }}</td>
                            <td>{{ $bien->transmission ?? '-' }}</td>
                            <td>{{ $bien->conso_sur_cent ?? '-' }}</td>
                            <td>{{ $bien->moteur ?? '-' }}</td>
                            <td>{{ $bien->Nbre_porte ?? '-' }}</td>
                            <td>{{ $bien->Nbre_place ?? '-' }}</td>
                            <td>{{ $bien->Description ?? '-' }}</td>
                            <td>
                                {{ optional($bien->type)->designation ?? '-' }}
                            </td>
                            <td>
                                {{ optional($bien->user)->nom_prenom ?? '-' }}
                            </td>
                            <td>
                                {{ optional($bien->modele)->designation ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($bien->marque)->designation ?? '-'
                                }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $bien)
                                    <a href="{{ route('biens.edit', $bien) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $bien)
                                    <a href="{{ route('biens.show', $bien) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $bien)
                                    <form
                                        action="{{ route('biens.destroy', $bien) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="19">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="19">{!! $biens->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
