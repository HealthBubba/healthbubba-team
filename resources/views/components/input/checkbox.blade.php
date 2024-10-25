@props([
    'checked' => false,
    'disabled' => false
])

<label class="form-check">
    <input type="checkbox" @checked($checked) @disabled($disabled) {{ $attributes->merge(['class' => 'form-check-input']) }} />
    <span class="form-check-label {{$labelClass ?? ''}}" >
        {{$slot}}
    </span>
</label>
