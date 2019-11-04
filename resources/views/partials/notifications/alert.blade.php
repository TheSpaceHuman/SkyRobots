@if(session('success-message'))
    <script type="text/javascript">
        setTimeout(function () {
          $.growl.notice({ title: "{{ session()->has('success-message-title') ? session('success-message-title') : '' }}", message: "{{ session('success-message') }}" });
        }, 1000);
    </script>
@endif
@if(session('error-message'))
    <script type="text/javascript">
      setTimeout(function () {
        $.growl.error({ title: "{{ session()->has('error-message-title') ? session('error-message-title') : '' }}", message: "{{ session('error-message') }}" });
      }, 1000);
    </script>
@endif
@if(session('info-message'))
    <script type="text/javascript">
      setTimeout(function () {
        $.growl({ title: "{{ session()->has('info-message-title') ? session('info-message-title') : '' }}", message: "{{ session('info-message') }}" });
      }, 1000);
    </script>
@endif
@if(session('warning-message'))
    <script type="text/javascript">
      setTimeout(function () {
        $.growl.warning({ title: "{{ session()->has('warning-message-title') ? session('warning-message-title') : '' }}", message: "{{ session('warning-message') }}" });
      }, 1000);
    </script>
@endif
