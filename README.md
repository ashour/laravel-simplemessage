Laravel SimpleMessage
=====================

SimpleMessage is a Laravel extension bundle that allows you to easily send messages to your views.

    // redirect with a message
    return Redirect::to('item_list')->with_message('Your item was added.');

    // redirect with a message, specifying a type
    return Redirect::to('item_list')
      ->with_message('There was a problem adding your item.', 'error');

Outputting messages in your views is performed through an automatic view variable
called `$messages`:

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