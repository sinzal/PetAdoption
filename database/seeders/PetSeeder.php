<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    public function run()
    {
        $pets = [
            [
                'name' => 'Buddy',
                'type' => 'dog',
                'breed' => 'Golden Retriever',
                'age' => '2 years',
                'price' => 150.00,
                'image_url' => 'https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=1.00xw:0.669xh;0,0.190xh&resize=1200:*',
                'description' => 'Friendly and loves to play fetch. Buddy is great with kids and other pets.',
                'is_available' => true,
            ],
            [
                'name' => 'Whiskers',
                'type' => 'cat',
                'breed' => 'Siamese',
                'age' => '1 year',
                'price' => 100.00,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/4/4d/Cat_November_2010-1a.jpg',
                'description' => 'Loves cuddles and nap time. Whiskers is a calm and affectionate companion.',
                'is_available' => true,
            ],
            // Add more sample pets as needed
        ];

        foreach ($pets as $pet) {
            Pet::create($pet);
        }
    }
}