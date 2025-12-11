<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdoptionController extends Controller
{

    public function submit(Request $request)
{
    return redirect()->route('cart');
}



    // public function submit(Request $request)
    // {
    //     // TEST if button works
    //     // You can remove this later
    //     // dd($request->all());

    //     // Normally you would save adoption details or add to cart
    // //     return redirect()->route('thankyou')->with('success', 'Adoption request submitted!');

    // }
}
