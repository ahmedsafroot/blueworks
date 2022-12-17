<?php
namespace App\Traits;

Trait GeneralTrait
{

    public function returnErrorMessage($msg,$code)
    {
        return response()->json([
            'status'=>false,
            'message'=>$msg,
        ],$code);
    }
    public function returnData($key,$value,$msg="",$code)
    {
        return response()->json([
            'status'=>true,
            'message'=>$msg,
            'data'=>[$key=>$value]
        ],$code);
    }
}
