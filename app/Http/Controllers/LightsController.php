<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Log;

class LightsController extends Controller
{
    //
    public function getLightStatus( $id ){
      $light = \App\LightsModel::find($id)->toArray();
      return $light['status'];
    }

    public function setLightStatus( $r , $id , $status ){
      $light = \App\LightsModel::find($id);
      $light->status = (bool)$status;
      $res =  $light->save();
      Log::info(' Set status '.print_r( $r->all() , true ).'-------'.print_r( $r->headers , true )  );
      return $res ? 1:0;
    }

    public function setLightValue( $r , $id , $value ){
      $light = \App\LightsModel::find($id);
      $light->value = $value;
      $res =  $light->save();
      Log::info( ' Set value '.$value . ' |||| ' . print_r( $r->all() , true ) .print_r( $r->headers , true ) );
      return $res ? 1:0;
    }


}
