#Laravel SimpleMessage#

SimpleMessage is a Laravel extension bundle that allows you to easily send messages to your views.

    // in a controller or route function
    return Redirect::to('item_list')->with_message('Your item was added.');

    {{-- in a view --}}
    @foreach ($messages->all() as $message)
      {{ $message }}
    @endforeach

#The Details#

##Redirecting##

    {{-- output all messages --}}
    @foreach ($messages->all() as $message)
      {{ $message }}
    @endforeach

    {{-- output all messages with type (for Twitter Bootstrap) --}}
    @foreach ($messages->all() as $message)
      <p class="alert {{ $message->type ? 'alert-'.$message->type }}">
        {{ $message }}
      </p>
    @endforeach