<label {{$attributes->merge(['class' => 'form-check form-check-custom'])->only(['class', 'x-bind:class'])}}>
    <input class="form-check-input" type="radio" {{ $attributes->except(['class', 'x-bind:class']) }}/>
    <span class="form-check-label {{$labelClass ?? ''}}">
        {{$slot}}
    </span>
</label>
