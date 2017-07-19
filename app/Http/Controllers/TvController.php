<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TvController extends Controller
{
    //
    public function on(){
     //turn tv on
     exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes POWER');
     // wait for 8 seconds
     usleep(9500000);
     // set volumen to 0
     for ($i=0; $i < 20 ; $i++) {
       usleep(3000);
       exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes TV_VOL_DOWN');
     }
     // set volumen to 10
     for ($i=0; $i < 10 ; $i++) {
       usleep(10000);
       exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes TV_VOL_UP');
     }
     die('1');
    }
    public function off(){
      exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes POWER');
      die('1');
    }

    public function volumeUp(){
      exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes TV_VOL_UP');
      die('1');
    }
    public function volumeDown(){
      exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes TV_VOL_DOWN');
      die('1');
    }

}
