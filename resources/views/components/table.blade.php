<table {{$attributes->merge(['class' => 'table align-middle table-row-dashed fs-6 gy-5', 'id' => 'datatable'])}} >
    {{$slot}}
</table>

@pushOnce('scripts')
    <script src="{{asset('/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endPushOnce

@push('scripts')
    <script>
        $("{{$id ?? '#datatable'}}").DataTable({
            info: !1,
            order: [],
            paging: false,
            "language": {
                "emptyTable": "{!! $placeholder ?? 'No data to show' !!}"
            },
            @isset($options)
                @js($options)
            @endisset
        });
    </script>
@endpush

@pushOnce('styles')
    <link href="{{asset('/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endPushOnce
