@php $editing = isset($marque) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="designation"
            label="Designation"
            :value="old('designation', ($editing ? $marque->designation : ''))"
            maxlength="100"
            placeholder="Designation"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $marque->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
