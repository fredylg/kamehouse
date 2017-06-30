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
          'ip' => '192.168.0.15',
          'status' => false,
          'value' => 0,
      ]);

      DB::table('lights')->insert([
        'name' => 'Alfresco',
        'ip' => '192.168.0.15',
        'status' => false,
        'value' => 0,
    ]);

    DB::table('lights')->insert([
      'name' => 'Big Lamp',
      'ip' => '192.168.0.15',
      'status' => false,
      'value' => 0,
  ]);


    }
}
