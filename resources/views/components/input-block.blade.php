<div class="mb-3">
    <label class="form-label text-capitalize" for="name">{{ $label ? $label : $name }}</label>
    <input type="text" class="form-control" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}">
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @isset($hint)
        {{ $hint }}
    @endisset
</div>