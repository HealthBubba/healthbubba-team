@props([
    'min' => 2000,
    'max' => now()->year
])

<x-input.select {{$attributes->except(['min', 'max'])}} >
    @forelse (\App\Library\AcademicYears::years($min, $max) as $year)
        <option value=""></option>
        <option value="{{$year}}">{{$year}}</option>
    @empty
    @endforelse
</x-input.select>