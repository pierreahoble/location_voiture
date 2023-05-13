@php $editing = isset($media) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            :value="old('type', ($editing ? $media->type : 'image'))"
            maxlength="20"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="lien"
            label="Lien"
            :value="old('lien', ($editing ? $media->lien : ''))"
            maxlength="255"
            placeholder="Lien"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="bien_id" label="Bien" required>
            @php $selected = old('bien_id', ($editing ? $media->bien_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Bien</option>
            @foreach($biens as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
