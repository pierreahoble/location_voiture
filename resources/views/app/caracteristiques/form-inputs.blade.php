@php $editing = isset($caracteristique) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="designation"
            label="Designation"
            :value="old('designation', ($editing ? $caracteristique->designation : ''))"
            maxlength="255"
            placeholder="Designation"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="valeur" label="Valeur" maxlength="255" required
            >{{ old('valeur', ($editing ? $caracteristique->valeur : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="bien_id" label="Bien" required>
            @php $selected = old('bien_id', ($editing ? $caracteristique->bien_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Bien</option>
            @foreach($biens as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
