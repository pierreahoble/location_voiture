@php $editing = isset($bien) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="designation"
            label="Designation"
            :value="old('designation', ($editing ? $bien->designation : ''))"
            maxlength="255"
            placeholder="Designation"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $bien->email : ''))"
            maxlength="255"
            placeholder="Email"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $bien->telephone : ''))"
            maxlength="255"
            placeholder="Telephone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="immatriculation"
            label="Immatriculation"
            :value="old('immatriculation', ($editing ? $bien->immatriculation : ''))"
            maxlength="255"
            placeholder="Immatriculation"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="prix_jour"
            label="Prix Jour"
            :value="old('prix_jour', ($editing ? $bien->prix_jour : ''))"
            max="255"
            step="0.01"
            placeholder="Prix Jour"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="annee"
            label="Annee"
            :value="old('annee', ($editing ? $bien->annee : ''))"
            maxlength="255"
            placeholder="Annee"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="couleur"
            label="Couleur"
            :value="old('couleur', ($editing ? $bien->couleur : ''))"
            maxlength="255"
            placeholder="Couleur"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type_consomation"
            label="Type Consomation"
            :value="old('type_consomation', ($editing ? $bien->type_consomation : ''))"
            maxlength="255"
            placeholder="Type Consomation"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="transmission"
            label="Transmission"
            :value="old('transmission', ($editing ? $bien->transmission : ''))"
            maxlength="255"
            placeholder="Transmission"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="conso_sur_cent"
            label="Conso Sur Cent"
            :value="old('conso_sur_cent', ($editing ? $bien->conso_sur_cent : ''))"
            maxlength="255"
            placeholder="Conso Sur Cent"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="moteur"
            label="Moteur"
            :value="old('moteur', ($editing ? $bien->moteur : ''))"
            maxlength="255"
            placeholder="Moteur"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Nbre_porte"
            label="Nbre Porte"
            :value="old('Nbre_porte', ($editing ? $bien->Nbre_porte : ''))"
            maxlength="255"
            placeholder="Nbre Porte"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Nbre_place"
            label="Nbre Place"
            :value="old('Nbre_place', ($editing ? $bien->Nbre_place : ''))"
            maxlength="255"
            placeholder="Nbre Place"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Description"
            label="Description"
            maxlength="255"
            >{{ old('Description', ($editing ? $bien->Description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type_id" label="Type" required>
            @php $selected = old('type_id', ($editing ? $bien->type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Type</option>
            @foreach($types as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gerant_id" label="User">
            @php $selected = old('gerant_id', ($editing ? $bien->gerant_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="modele_id" label="Modele" required>
            @php $selected = old('modele_id', ($editing ? $bien->modele_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Modele</option>
            @foreach($modeles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="marque_id" label="Marque" required>
            @php $selected = old('marque_id', ($editing ? $bien->marque_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Marque</option>
            @foreach($marques as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
