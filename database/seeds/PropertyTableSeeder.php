<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'name' => 'Maya',
            'description' => 'This eco conscious zen oasis is positioned in the prime location of Parktown North, with 
            many of Johannesburg\'s favourite points of interest right on your doorstep. Rosebank & Sandton CBD, Melrose 
            Arch, Parkhurst, Zoo Lake, Hyde Park Corner - to mention just a few, are just a few minutes away, with Keyes 
            Art Mile and major bus stations right on your doorstep.',
            'address' => '68a 1st Avenue East',
            'price' => 2499900,
            'is_paid' => true,
            'is_winner' => true,
            'buyer_id' => 2,
            'image' => 'image1.jpg',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('properties')->insert([
            'name' => 'Cedar Estate',
            'description' => 'This new generation designer Cluster has been customised with top finishes and is ready 
            to move in. Interior open-plan design, lounge with gas fireplace. Kitchen with breakfast nook, plus a 
            scullery with space for appliances. Three bedrooms, two baths, and a guest cloakroom. North facing bedrooms 
            with balconies. The reception flows to the covered patio overlooking the landscaped garden and heated pool. 
            The patio has an under counter fridge and cupboard space.',
            'address' => '35 Ballyclare Ave, Bryanston, Sandton',
            'price' => 4100000,
            'is_paid' => false,
            'is_winner' => false,
            'image' => 'image2.jpeg',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('properties')->insert([
            'name' => 'Melrose View',
            'description' => 'Situated a stone’s throw from the prominent Melrose Arch, Melrose View has been built 
            for both convenience and metropolitan lifestyle. Elegant finishes await you in these beautiful and 
            remarkably spacious apartments. This stunning development is also perfectly central to essential amenities, 
            top schools and offers easy access to the M1 highway.',
            'address' => '57 Atholl Oaklands Road, Melrose North',
            'price' => 4500000,
            'is_paid' => false,
            'is_winner' => false,
            'image' => 'image3.jpeg',
            'user_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('properties')->insert([
            'name' => 'Benmore Gardens',
            'description' => 'Negotiating all written offers FROM R9,99 million
            Situated in the highly sought after Waterstone Estate in Benmore Gardens this French Provencal home is one 
            in a million. Enter through the exquisite gardens and be transported into a world of bespoke finishes, high 
            ceilings with exposed trusses, and living spaces that will make you never want to leave. 5 reception rooms 
            allow you to blend between inside and outside living, with superb views of the sublime gardens and unique 
            rock pool. 3 spacious en suite bedrooms, double garaging, gentleman\'s study with built-in cherry wood 
            library, temperature-controlled wine cellar, extra workshop area or 3rd garage, and double en suite staff 
            quarters above the garage. Choose a lifestyle of unsurpassed quality, security, and serenity.',
            'address' => '57 Atholl Oaklands Road, Melrose North',
            'price' => 9999000,
            'is_paid' => false,
            'is_winner' => false,
            'image' => 'noimage.png',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('properties')->insert([
            'name' => '4 Bedroom house for sale in Bryanston',
            'description' => 'Going on Auction, Sunday 23rd August @ 12 pm This beautiful, bright and luxurious home is 
            situated in the heart of Bryanston and has so much to offer. As you enter the home you are welcomed by a 
            grand entrance hall. This lovely home offers you many special areas for enjoying family life - whether private, 
            with family or with friends. The property comprises 4 spacious bedrooms with 3 en-suite bathrooms. The master 
            bedroom has a walk-in dressing room and the bathroom has an inviting Jacuzzi bath. There is an open-plan 
            lounge and dining room leading onto a massive covered patio with built-in braai making it an ideal place for 
            entertaining a large number of guests. .',
            'address' => '7 Mandeville Gardens, 65 Mandeville Road, Bryanston',
            'price' => 3500000,
            'is_paid' => false,
            'is_winner' => false,
            'image' => 'image4.jpg',
            'user_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('properties')->insert([
            'name' => 'Super modern designer cluster in Bryanston',
            'description' => 'This new generation designer Cluster has been customised with top finishes and is ready to
             move in to. Interior open-plan design, lounge with gas fireplace. Kitchen with breakfast nook, plus a 
             scullery with space for appliances. Three bedrooms, two baths, and a guest cloakroom. North facing bedrooms 
             with balconies. The reception flows to the covered patio overlooking the landscaped garden and heated pool. 
             The patio has an under counter fridge and cupboard space.
             Double garage customised with storage cupboards and space for fridge/deep freeze. Two carports. 24 hr 
             complex security.',
            'address' => '47 Sandton Shul Road, Bryanston',
            'price' => 10500000,
            'is_paid' => false,
            'is_winner' => false,
            'image' => 'image5.jpeg',
            'user_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
