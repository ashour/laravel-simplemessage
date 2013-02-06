#Laravel SimpleMessage#

SimpleMessage is a Laravel extension bundle that allows you to easily send messages to your views, centralizing your application's message system and keeping you [DRY][dry].

[dry]: http://en.wikipedia.org/wiki/Don't_repeat_yourself "Don't Repeat Yourself"

If you're familiar with [Laravel's validation error messages][validation], you'll find SimpleMessage follows similar conventions.

[validation]: http://laravel.com/docs/validation#retrieving-error-messages

    // redirect to a route with a message
    return Redirect::to('item_list')->with_message('Your item was added.');

    // output messages
    foreach ($messages->all() as $message)
    {
      echo $message;
    }

##Redirecting with Messages##

###Redirect with a message###

    return Redirect::to('item_list')->with_message('Your item was added');

###Redirect with a message and type###

    return Redirect::to('item_list')
      ->with_message('There was a problem adding your thing.', 'error');

###Redirect with multiple messages###

    return Redirect::to('item_list')
      ->with_message('There was a problem adding your thing.', 'error')
      ->with_message('Another thing you need to know.', 'info');

##Outputting Messages##

SimpleMessage makes a `$messages` variables available to all your views. It works the same way as Laravel's validation `$error` variable.

###Outputting all messages###

    foreach ($messages->all() as $message)
    {
      echo $message;
    }

###Outputting all messages of a given type###
  
    foreach ($messages->get('error') as $message)
    {
      echo $message;
    }
  
###Outputting first message of all types###

    echo $messages->first();

###Outputting first message of a given type###

    echo $messages->first('error');

##Formatting##

If you're using something like Twitter Bootstrap, or using your own CSS styling,
you'll appreciate SimpleMessage's message formatting. The `all()`, `get()`, and
`first()` methods take an optional format parameter that allows you to easily format your messages.

###Outputting all messages with formatting###

    foreach ($messages->all('<p class="alert">:message</p>') as $message)
    {
      echo $message;
    }

###Outputting all messages of a given type with formatting###

    foreach ($messages->get('error', <p class="alert alert-:type">:message</p>') as $message)
    {
      echo $message;
    }

###Outputting first message of a type with formatting###

    echo $messages->first('error', '<p class="alert alert-:type">:message</p>');

##Message Attributes##

For maximum flexibility, you can access the text and type messages attributes
directly. 

###Output all messages using message attributes###

    foreach ($messages->all() as $message)
    {
      echo 'Message text: '.$message->text.'<br>';
      echo 'Message type: '.$message->type.;
    }

##View Partials##

To keep message output code centralized, you can use Laravel
place your message output code in a partial view, which you can include
in other views.

For your convenience, SimpleMessage provides two partial views that you can use to output your messages within other views. The SimpleMessage partials use the [Twitter Bootstrap alert class convention][bootstrap].

[bootstrap]: http://twitter.github.com/bootstrap/components.html#alerts

###Output all messages using the formatted view partial###

Using Laravel's [Blade][blade] templating engine,

[blade]: http://laravel.com/docs/views/templating#blade-template-engine

    @include('simplemessage::partials.formatted')

###Output all messages using message attributes###

    @include('simplemessage::partials.raw')

##Unit Tests##

I've tried to test the SimpleMessage bundle as thoroughly as possible. You can run the SimpleMessage tests through Laravel's [artisan][artisan]:

[artisan]: http://laravel.com/docs/artisan/commands#unit-tests

    php artisan test simplemessage

