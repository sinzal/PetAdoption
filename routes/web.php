<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/adoption', function () {
    // Sample pets data - in a real app this would come from a database
    $pets = [
        ['id' => 1, 'name' => 'Buddy', 'type' => 'dog', 'breed' => 'Golden Retriever', 'age' => '2 years', 'price' => 150, 'image' => 'dog1.jpg', 'description' => 'Friendly and loves to play fetch'],
        ['id' => 2, 'name' => 'Whiskers', 'type' => 'cat', 'breed' => 'Siamese', 'age' => '1 year', 'price' => 100, 'image' => 'cat1.jpg', 'description' => 'Loves cuddles and nap time'],
        ['id' => 3, 'name' => 'Polly', 'type' => 'parrot', 'breed' => 'African Grey', 'age' => '3 years', 'price' => 300, 'image' => 'parrot1.jpg', 'description' => 'Very talkative and intelligent'],
        ['id' => 4, 'name' => 'Thumper', 'type' => 'rabbit', 'breed' => 'Holland Lop', 'age' => '6 months', 'price' => 75, 'image' => 'rabbit1.jpg', 'description' => 'Loves carrots and hopping around'],
        ['id' => 5, 'name' => 'Squeaky', 'type' => 'mouse', 'breed' => 'Fancy Mouse', 'age' => '4 months', 'price' => 20, 'image' => 'mouse1.jpg', 'description' => 'Tiny and curious explorer'],
        ['id' => 6, 'name' => 'Azure', 'type' => 'peacock', 'breed' => 'Indian Peafowl', 'age' => '2 years', 'price' => 500, 'image' => 'peacock1.jpg', 'description' => 'Magnificent feathers and proud'],
        ['id' => 7, 'name' => 'Max', 'type' => 'dog', 'breed' => 'Beagle', 'age' => '3 years', 'price' => 120, 'image' => 'dog2.jpg', 'description' => 'Great sense of smell and friendly'],
        ['id' => 8, 'name' => 'Luna', 'type' => 'cat', 'breed' => 'Maine Coon', 'age' => '2 years', 'price' => 150, 'image' => 'cat2.jpg', 'description' => 'Fluffy and gentle giant'],
    ];
    
    return view('adoption', compact('pets'));
})->name('adoption');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

Route::get('/productdetail1', function () {
    return view('productdetail1');
})->name('productdetail1');