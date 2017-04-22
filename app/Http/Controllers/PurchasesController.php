<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\{Charge, Customer };

class PurchasesController extends Controller
{
    public function store() {

    	// dd(request()->all());

    	
    	$customer = Customer::create([

    		'email' => request('stripeEmail'),

    		'source' => request('stripeToken')

    		]);

    	Charge::create([

    		'customer' => $customer->id,
    		
    		'amount' => 2100,
    		
    		'currency' => 'usd'
    		
    		]);

    	return 'All Done';

    }
}
