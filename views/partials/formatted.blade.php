{{-- output messages using format string --}}
{{-- show all general app messages using Twitter Bootstrap styles --}}
@foreach ($messages->all('<p class="alert alert-:type">:message</p>') as $message)
  {{ $message }}
@endforeach