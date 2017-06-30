<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Log;

class LightsController extends Controller
{
    private $sonoff_url;
    //
    public function getLightStatus( $id ){
      $light = \App\LightsModel::find($id)->toArray();
      return $light['status'];
    }

    public function setLightStatus( $r , $id , $status ){
      $current_status = $this->getLightStatus( $id );
      if($current_status != $status && $id == 1 ){
          $this->toggleSonOffStatus( 'http://192.168.0.15/ay?o=1' );
      }
      $light = \App\LightsModel::find($id);
      $light->status = (bool)$status;
      $res =  $light->save();

      return $res ? 1:0;
    }

    public function setLightValue( $r , $id , $value ){
      $light = \App\LightsModel::find($id);
      $light->value = $value;
      $res =  $light->save();
      return $res ? 1:0;
    }
    public function getLightValue( $r , $id ){
      $light = \App\LightsModel::find($id)->toArray();
      return $light['value'];
    }

    private function toggleSonOffStatus( $sonoff_url ){
        file_get_contents($sonoff_url);
        return true;
    }


}
