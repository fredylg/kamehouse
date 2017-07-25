<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ACController extends Controller
{
    //
    public function on(){
     //turn ac on
     exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes AC_ON');
     die('1');
    }
    public function off(){
      exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes AC_OFF');
      die('1');
    }
    public function pos5(){
      exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes AC_POS_5');
      die('1');
    }
    public function posAuto(){
      exec('cd /home/pi/mirror && ./irrp.py -p -g22 -fcodes AC_POS_5');
      die('1');
    }

}
