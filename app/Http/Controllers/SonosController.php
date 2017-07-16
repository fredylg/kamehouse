<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SonosController extends Controller
{
    //
    public function __construct( ){
        $this->server = 'http://192.168.0.7:5005';
        $this->zone = 'DiningRoom';
        $this->volumenRate = '8';

    }

    public function play(){
     $res =   file_get_contents($this->server . '/' . $this->zone . '/play');
     return $res;
    }

    public function pause(){
     $res =   file_get_contents($this->server . '/' . $this->zone . '/pause');
     return $res;
    }

    public function volumeUp(){
     $res =   file_get_contents($this->server . '/' . $this->zone . '/volume/+' . $this->volumenRate );
     return $res;
    }

    public function volumeDown(){
     $res =   file_get_contents($this->server . '/' . $this->zone . '/volume/-' . $this->volumenRate );
     return $res;
    }

    public function playNext(){
     $res =   file_get_contents($this->server . '/' . $this->zone . '/next' );
     return $res;
    }

    public function playPrevious(){
     $res =   file_get_contents($this->server . '/' . $this->zone . '/previous'  );
     return $res;
    }

    public function fakeIt( $val = 0 ){
      if($val == 0 ){
        return  $this->pause();
      }
      $percentage = $this->linearEquation( $val );
      $res =   file_get_contents($this->server . '/' . $this->zone . '/volume/' . $this->volumenRate );
      return $res;
    }

    private function linearEquation( $val ){
      return 0.666 * $val + 3.34;
    }


}
