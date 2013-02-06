{{-- output messages using message attributes --}}
{{-- show all general app messages using Twitter Bootstrap styles --}}
@foreach ($messages->all() as $message)
  <p class="alert {{ $message->type ? 'alert-'.$message->type : '' }}">{{ $message->text }}</p>
@endforeach