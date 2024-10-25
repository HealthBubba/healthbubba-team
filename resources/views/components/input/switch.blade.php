@props([
    'checked' => false,
    'disabled' => false
])
<label class="form-check form-switch form-check-custom form-check-solid">
    <input class="form-check-input" {{ $attributes }} @checked($checked) @disabled($disabled) type="checkbox" />
    <span class="form-check-label">
        {{$slot}}
    </span>
</label>