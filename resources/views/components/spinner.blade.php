@props([
    'message' => 'Loading...',
    'color' => 'white'
])
<span class="spinner-border spinner-border-sm text-{{$color}} {{$class ?? ''}}"  role="status" {{ $attributes->except('class') }}>
    <span class="visually-hidden">{{$message}}</span>
</span>
