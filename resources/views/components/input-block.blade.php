<div class="mb-3">
    <label class="form-label" for="name">{{ $label ? $label : $name }}</label>
    <input type="text" class="form-control" placeholder="{{ $placeholder }}" name="{{ $name }}">
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>