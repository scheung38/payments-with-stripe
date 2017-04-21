<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\{Stripe, Charge, Customer };

class PurchasesController extends Controller
{
    public function store() {

    	// dd(request()->all());

    	Stripe::setApiKey(config('services.stripe.secret'));

    	$customer = Customer::create([

    		'email' => request('stripeEmail'),

    		'source' => request('stripeToken')

    		]);

    	Charge::create([

    		'customer' => $customer->id,
    		
    		'amount' => 99,
    		
    		'currency' => 'usd'
    		
    		]);

    	return 'All Done';

    }
}
