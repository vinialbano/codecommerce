<?php namespace CodeCommerce\Handlers\Events;

use CodeCommerce\Events\CheckoutEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class SendEmailOnCheckout {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  CheckoutEvent  $event
	 * @return void
	 */
	public function handle(CheckoutEvent $event)
	{
        $order = $event->getOrder();
        $user = $order->user;

        Mail::send('emails.checkout', compact('order', 'user'), function($message) use ($order, $user)
        {
            $message->to($user->email, $user->name)->subject('Your order details');
        });
	}

}
