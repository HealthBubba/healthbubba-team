@pushOnce('scripts')
    <script src="{{asset('custom/js/imask.js')}}"></script>
@endPushOnce

<div x-data="{
    amount: '',
    symbol: @js($symbol ?? '₦'),
    mask: null,
    amountInput: null
}">
    <x-input  x-init="
        mask = IMask($el, {
                mask: `${symbol} num`,
                blocks: {
                    num: {
                        mask: Number,
                        thousandsSeparator: ','
                    }
                }
            }
        )
    " placeholder="0" class="appearance-none" type="text" {{$attributes->except('name')->whereDoesntStartWith('wire:model')->merge([
        'x-on:keyup' => '$refs.amountInput.value = mask.unmaskedValue; $refs.amountInput.dispatchEvent(new Event(`input`))'
    ])}} name="{{isset($show) ? $name : null}}" />
    <input type="number" {{$attributes->except('name')}} {{$attributes->whereStartsWith('wire:model')}} x-ref="amountInput" name="{{isset($show) ? null : $name}}" hidden/>

    {{-- fn($value, $key) => $key ==  --}}
</div>

{{-- x-on:keyup="$refs.amountInput.value = mask.unmaskedValue; $refs.amountInput.dispatchEvent(new Event('input'))" --}}
