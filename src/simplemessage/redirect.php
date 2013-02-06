<?php namespace SimpleMessage;

use Laravel\Session;
use SimpleMessage\Messaging\Typed\Messages as TypedMessages;

class Redirect extends \Laravel\Redirect {

	/**
	 * Flash a general message to the session data.
	 *
	 * This method allows you to conveniently pass messages to views.
	 *
	 * <code>
	 *		// Redirect and flash messages to the session
	 *		return Redirect::to('item_list')->with_message('Your item was added.');
	 *
	 *    // Flash a message with a type
	 *		return Redirect::to('item_list')->with_message('Your item was added.', 'success');
	 * </code>
	 * 
	 * @param  string $text
	 * @param  string $type
	 * @return Redirect
	 */
	public function with_message($text, $type = '')
	{
		$messages = Session::get('messages', new TypedMessages);

		$messages->add_typed($text, $type);

		Session::flash('messages', $messages);

		return $this;
	}

}