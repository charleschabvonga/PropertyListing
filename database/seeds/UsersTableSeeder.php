<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $realtorRole = Role::where('name', 'realtor')->first();
        $buyerRole = Role::where('name', 'buyer')->first();

        $user1 = User::create([
            'name' => 'Charles',
            'surname' => 'Chabvonga',
            'email' => 'realtor@property.com',
            'mobile_number' => '0634898514',
            'password' => Hash::make('password')
        ]);

        $user2 = User::create([
            'name' => 'Jordan',
            'surname' => 'Olsen',
            'email' => 'buyer@property.com',
            'mobile_number' => '0644898514',
            'password' => Hash::make('password')
        ]);

        $user3 = User::create([
            'name' => 'Cameron',
            'surname' => 'Will',
            'email' => 'will@property.com',
            'mobile_number' => '0644898514',
            'password' => Hash::make('password')
        ]);

        $user4 = User::create([
            'name' => 'Tristan',
            'surname' => 'Carswell',
            'email' => 'cars@property.com',
            'mobile_number' => '0644898514',
            'password' => Hash::make('password')
        ]);

        $user5 = User::create([
            'name' => 'Chad',
            'surname' => 'Olsen',
            'email' => 'chad@property.com',
            'mobile_number' => '0644898514',
            'password' => Hash::make('password')
        ]);

        $user1->roles()->attach($realtorRole);
        $user2->roles()->attach($buyerRole);
        $user3->roles()->attach($buyerRole);
        $user4->roles()->attach($realtorRole);
        $user5->roles()->attach($buyerRole);
    }
}
