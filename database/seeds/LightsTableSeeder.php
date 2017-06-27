<?php

use Illuminate\Database\Seeder;

class LightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lights')->insert([
          'name' => 'Living Room',
          'status' => false,
          'value' => 0,
      ]);

      DB::table('lights')->insert([
        'name' => 'Alfresco',
        'status' => false,
        'value' => 0,
    ]);

    DB::table('lights')->insert([
      'name' => 'Big Lamp',
      'status' => false,
      'value' => 0,
  ]);


    }
}
