@php
    $toast = session('toast');
@endphp

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>

<style>
    @media screen and (max-width: 465px) {
        .toastr{
            width: 100% !important;
        }

        #toastr-container {
            width: 90% !important;
        }
    }

    @media screen and (min-width: 466px) {
        .toastr{
            width: 100% !important;
        }

        #toastr-container {
            width: 400px !important;
        }
    }
</style>

@if($toast)
    @if ($toast['status'] == 'success')
        <script>
            toastr.success("{{$toast['message']}}", "{{$toast['title']}}");
        </script>
    @endif

    @if ($toast['status'] == 'warning')
        <script>
            toastr.warning("{{$toast['message']}}", "{{$toast['title']}}");
        </script>
    @endif

    @if ($toast['status'] == 'error')
        <script>
            toastr.error("{{$toast['message']}}", "{{$toast['title']}}");
        </script>
    @endif

    @if ($toast['status'] == 'info')
        <script>
            toastr.info("{{$toast['message']}}", "{{$toast['title']}}");
        </script>
    @endif
@endif


<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('toast', (event) => {
            switch (event[0].status) {
                case 'success':
                    toastr.success(event[0].message, event[0].title);
                    break;
                case 'error':
                    toastr.error(event[0].message, event[0].title);
                    break;
                case 'info':
                    toastr.info(event[0].message, event[0].title);
                    break;
                case 'warning':
                    toastr.warning(event[0].message, event[0].title);
                    break;
                default:
                    break;
            }
       });
    });
</script>
