@props([
    'left',
    'right',
    'showPadding',
    'spanClass' => '',
    'groupClass' => ''
])

<div class="input-group {{$groupClass}}">
    @isset($left)
        <span class="input-group-text fs-6 bg-transparent border-end-0 {{$spanClass}} {{isset($showPadding) ? '' : 'pe-0'}}" {{$left->attributes}} >{{$left}}</span>
    @endisset
    <x-input type="text" class="form-control fs-6 {{($left ?? null) ? 'border-start-0' : ''}} {{($right ?? null) ? 'border-end-0' : ''}}" {{$attributes}} />
    @isset($right)
        <span class="input-group-text bg-transparent border-start-0 fs-6 {{$spanClass}} {{isset($showPadding) ? '' : 'ps-0'}}" {{$right->attributes}} >{{$right}}</span>
    @endisset
</div>
