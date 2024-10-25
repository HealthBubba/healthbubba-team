<span wire:ignore {{$attributes->merge([
    'x-data' => '',

])->only('x-data')}}
    @if (isset($key))
        wire:key="select-input-{{$selectKey ?? Str::random(7)}}"
    @endif
>
    <style>
        .form-select{
            pointer-events: auto !important
        }
    </style>
    <select x-init="
        $($el).select2({
            placeholder: `{{$placeholder ?? 'Select an Option'}}`,
            minimumResultsForSearch: @isset($search) null @else Infinity @endisset,
            multiple: @js(isset($multiple)),
            allowClear: @js(isset($clearable)),
            closeOnSelect: @json(!isset($open)),
            tags: @js(isset($tags)),
            @isset($parent)
                @if (!empty($parent))
                    dropdownParent: $('#{{$parent}}'),
                @endif
            @endisset
            @isset($templates)
                templateSelection: templateSelection ?? optionFormat,
                templateResult: optionFormat,
            @endisset
        });

        $($el).on('change', (e) => {
            e.target.dispatchEvent(new Event('change'));
            for (const name of e.target.getAttributeNames()) {
                if(name.includes('wire:model')) return $wire.set(e.target.getAttribute(name), $(e.target).select2('val'));
                if(name.includes('x-model')) return $el._x_model.set($(e.target).select2('val'));
            }
        });

    " {{$attributes->merge(['class' => 'form-select'])->except('x-data')}}  >
        {{$slot}}
    </select>
</span>
