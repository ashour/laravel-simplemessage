#Laravel SimpleMessage#

SimpleMessage is a Laravel extension bundle that allows you to easily send messages to your views, centralizing your application's message system and keeping you <abbr title="Don't Repeat Yourself">DRY</abbr>.

    // in a controller or route function
    return Redirect::to('item_list')->with_message('Your item was added.');

    {{-- in a view --}}
    @foreach ($messages->all() as $message)
      {{ $message }}
    @endforeach

##Redirecting with Messages##

###Redirect with a message###

    return Redirect::to('item_list')->with_message('Your item was added');

###Redirect with a typed message###

    @foreach ($messages->all() as $message)
      {{ $message }}
    @endforeach

    {{-- output all messages with type (for Twitter Bootstrap) --}}
    @foreach ($messages->all() as $message)
      <p class="alert {{ $message->type ? 'alert-'.$message->type }}">
        {{ $message }}
      </p>
    @endforeach