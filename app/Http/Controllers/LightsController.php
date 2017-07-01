<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App;
use Log;

class LightsController extends Controller
{
    private $light;

    public function __construct($id){
        $this->lamp_id = $id;
        $this->light = \App\LightsModel::find($this->lamp_id);
    }

    public function getLightStatus(){
       // this kill the microcontroller
        // $status = $this->getLightStatusSonOff();
        // if( $status !=  $this->light['status'] ){
        //     $this->setLightStatusDB( $status );
        // }
        // return $status;
        //dd($this->light['status']);

        $value_cached = Cache::get($this->lamp_id.'_value');
        if ($value_cached == null) {
          $expiresAt = Carbon::now()->addSeconds(10);
          Cache::put( $this->lamp_id.'_value', $this->light['status'] , $expiresAt);
          $status = $this->light['status'];
        }else{
          $status = $value_cached;
        }
        return $status ;
    }

    public function setLightStatus( $status ){
      $this->setLightStatusSonOff( $status );
      $res = $this->setLightStatusDB( $status );
      return $res;
    }

    public function setLightValue( $value ){
      $light = \App\LightsModel::find($id);
      $light->value = $value;
      $res =  $light->save();
      return $res ? 1:0;
    }

    public function getLightValue( ){
      $light = \App\LightsModel::find($id)->toArray();
      return $light['value'];
    }

    private function getLightStatusSonOff( ){
      $on = substr(trim(file_get_contents('http://'.$this->light['ip'].'/cm?cmnd=Power')),-2);
      if( $on == 'ON'){
        return 1;
      }else{
        return 0;
      }
    }

    private function setLightStatusSonOff( $status ){
      $on = substr(trim(file_get_contents('http://'.$this->light['ip'].'/cm?cmnd=Power%20' . $status )),-2);
      if( $on == 'on'){
        return 1;
      }else{
        return 0;
      }
    }

    private function setLightStatusDB( $status ){
      $light = \App\LightsModel::find( $this->lamp_id );
      $light->status = (bool)$status;
      $res =  $light->save();
      return $res ? 1:0;
    }


}
