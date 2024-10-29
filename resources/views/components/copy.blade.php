<span {{$attributes->merge(['class' => 'badge badge-light-success badge-sm'])->except(['label'])}}  
    role="button" 
    onclick="window.navigator.clipboard.writeText('{{$value}}');
    toastr.success('Copied to Clipboard', 'Success')">{{$slot ? 'Copy' : $slot}}</span>