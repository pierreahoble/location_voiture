@php $editing = isset($modele) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="designation"
            label="Designation"
            :value="old('designation', ($editing ? $modele->designation : ''))"
            maxlength="255"
            placeholder="Designation"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $modele->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
