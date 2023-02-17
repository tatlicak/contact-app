<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
        public function run()
        {
            $contacts=[];
            $companyIDs= DB::table('companies')->pluck('id');
    
            $faker=Faker::create();
    
            foreach(range(1,10) as $index){
    
              $contact=[
    
                    'first_name' => $faker->firstName(),
                      'last_name'=>$faker->lastName(),
                      'phone'=>$faker->phoneNumber(),
                      'email'=>$faker->email(), 
                      'address'=>$faker->address(),
                      'company_id'=>$faker->randomElement($companyIDs),
                      'created_at'=>now(),
                      'updated_at'=>now()
                    ];
                    $contacts[]=$contact;
            }
            //DB::table('contacts')->delete();
            DB::table('contacts')->insert($contacts);
        }
}
