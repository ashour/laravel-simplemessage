
{{-- Outputs messages using format string --}}
{{-- Shows all general app messages using Twitter Bootstrap styles --}}
@foreach ($messages->all('<p class="alert alert-:type">:message</p>') as $message)
  {{ $message }}
@endforeach