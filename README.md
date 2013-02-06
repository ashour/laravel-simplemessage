#Laravel SimpleMessage#

SimpleMessage is a Laravel extension bundle that allows you to easily send messages to your views, centralizing your application's message system and keeping you [DRY][dry].

[dry]: http://en.wikipedia.org/wiki/Don't_repeat_yourself "Don't Repeat Yourself"

If you're familiar with [Laravel's validation error messages][validation], you'll find SimpleMessage follows similar conventions.

[validation]: http://laravel.com/docs/validation#retrieving-error-messages

    // redirect to a route with a message
    return Redirect::to('item_list')->with_message('Your item was added.', 'success');

    // output messages
    foreach ($messages->all() as $message)
    {
      echo $message;
    }

##Installation##

You can install SimpleMessage through [artisan][art-install]:

[art-install]: http://laravel.com/docs/bundles#installing-bundles

    php artisan bundle:install simplemessage

Once you've installed the bundle, register it by adding an entry in your application/bundles.php file:

    return array('some_other_bundle' => array(...), 'yet_another', 'simplemessage');

Add the bundle to your application/start.php file under `Autoloader::directories`:

    Autoloader::directories(array(
      path('app').'models',
      path('app').'libraries',
      Bundle::path('simplemessage').'src',
    ));

Finally, set your `Register` and `View` aliases to use the SimpleMessage classes in application/config/application.php. (Don't worry, SimpleMessage simply extends the Laravel core classes):

    return array(
      // ... other configs

      'aliases' => array(
        // ... other aliases
        'Redirect'    => 'SimpleMessage\\Redirect',
        // ...
        'View'        => 'SimpleMessage\\View',
      ),
    );

That's it. You're all installed and ready to use SimplMessage.

##Redirecting with Messages##

###Redirect with a message###

    return Redirect::to('item_list')
      ->with_message('Hey, you should know about this.');

###Redirect with a message and type###

    return Redirect::to('item_list')
      ->with_message('Your item was added.', 'success');

###Redirect with multiple messages###

    return Redirect::to('item_list')
      ->with_message('Your item was added.', 'success')
      ->with_message('Another thing you need to know.', 'info');

##Outputting Messages##

SimpleMessage makes a `$messages` variable available to all your views. It works the same way as Laravel's validation `$error` variable.

###Output all messages###

    foreach ($messages->all() as $message)
    {
      echo $message;
    }

###Output all messages of a given type###
  
    foreach ($messages->get('success') as $message)
    {
      echo $message;
    }
  
###Output first message of all messages###

    echo $messages->first();

###Output first message of a given type###

    echo $messages->first('success');

##Formatting##

If you're using something like Twitter Bootstrap, or using your own CSS styling, you'll appreciate SimpleMessage's message formatting. Just like Laravel's validation errors, SimpleMessage's output methods take an optional format parameter, which allows you to easily format your messages using `:message` and `:type` placeholders.

###Output all messages with formatting###

    foreach ($messages->all('<p class=":type">:message</p>') as $message)
    {
      echo $message;
    }

##Message Attributes##

For maximum flexibility, you can access the text and type of a message directly
through message attributes.

###Output all messages using message attributes###

    foreach ($messages->all() as $message)
    {
      echo 'Message text: '.$message->text.'<br>';
      echo 'Message type: '.$message->type.;
    }

##View Partials##

To keep message output code centralized, you can place your message output code in a partial view, and include the partial in your other views.

For your convenience, SimpleMessage provides a partial views that outputs
all messages using the [Twitter Bootstrap alert class convention][bootstrap].

[bootstrap]: http://twitter.github.com/bootstrap/components.html#alerts

###Output all messages using the included view partial###

Using Laravel's [Blade][blade] templating engine,

[blade]: http://laravel.com/docs/views/templating#blade-template-engine

    @include('simplemessage::out')

##Unit Tests##

I've tried to test the SimpleMessage bundle as thoroughly as possible. You can run the SimpleMessage tests through Laravel's [artisan][artisan] command-line utility:

[artisan]: http://laravel.com/docs/artisan/commands#unit-tests

    php artisan test simplemessage

