@props([
    // 'options' => []
])

@pushOnce('scripts')
    <script src="{{asset('js/plugins/choices/choices.min.js')}}"></script>
@endPushOnce

@pushOnce('styles')
    <link rel="stylesheet" href="{{asset('js/plugins/choices/choices.min.css')}}"/>
@endPushOnce

<select
    x-data="{
        choices: null
    }"

    x-init="
        choices = new Choices($el, {

        })
    "

    {{$attributes->merge([
        'class' => 'form-select form-control'
    ])}}
>
    {{$slot}}
</select>


