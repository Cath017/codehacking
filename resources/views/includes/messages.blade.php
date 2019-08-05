<script>
    @if(Session::has('message'))
    var type = "{{Session::get('type', 'info')}}"
    switch(type){
      case 'info':
        toastr.info("{{Session::get('message')}}")
        break;
        case 'success':
        toastr.success("{{Session::get('message')}}")
        break;
        case 'warning':
        toastr.warning("{{Session::get('message')}}")
        break;
        case 'error':
        toastr.error("{{Session::get('message')}}")
        break;
    }
    @endif
    </script>

    {{-- <script>
@if(Session::has('success'))
toastr.success("{{ Session::get('success') }}");
@elseif(Session::has('info'))
toastr.info("{{ Session::get('info') }}");
@elseif(Session::has('warning'))
toastr.warning("{{ Session::get('warning') }}");
@elseif(Session::has('error'))
toastr.error("{{ Session::get('error') }}");
@endif
</script> --}}