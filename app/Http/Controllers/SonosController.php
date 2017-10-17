<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SonosController extends Controller
{
    //
    private $properties;
    public function __construct( ){
        $this->server = 'http://192.168.0.15:5005';
        $this->zone = 'DiningRoom';
        $this->volumenRate = '8';
        $this->properties = null ;

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

    public function setFakeVolumen( $val = 0 ){
      if($val == 0 ){
        return  $this->pause();
      }
      $percentage = $this->linearEquation( $val );
      $res =   file_get_contents($this->server . '/' . $this->zone . '/volume/' . $percentage );
      return $percentage;
    }



    /* --------------- GETTERS ----------------*/
    private function getStatus(){
      $res =   file_get_contents($this->server . '/' . $this->zone . '/state');
      $state = json_decode($res, true );
      $this->properties = (object)$state;
    //  dd(  $this->properties);
      return true;
    }

    public function getVolumen(){
      if(isset($this->properties->volume)){
          return $this->properties->volume;
      }
      $this->getStatus();
      return $this->properties->volume;
    }

    public function getFakeVolumen(){
      return $this->invertedlinearEquation($this->getVolumen());
    }

    public function getFakeStatus(){
      if(!isset($this->properties->playbackState)){
          $this->getStatus();
      }
      //PAUSED_PLAYBACK//PLAYING
      if($this->properties->playbackState == 'PLAYING'){
        return '1';
      }
      return '0';
    }

/* --------------- TOOLS ----------------*/
    private function linearEquation( $val ){
      return 0.666 * $val + 3.34;
    }
    private function invertedlinearEquation( $subVal ){
      $r = $subVal - 3.34 / 0.666  ;
      return $r < 1  ? 1 : $r ;
    }


}
