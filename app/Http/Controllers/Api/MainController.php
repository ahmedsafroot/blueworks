<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class MainController extends Controller
{
    use GeneralTrait;
    //
    public function count_numbers($start,$end){
        if(!is_numeric($start) || !is_numeric($end)){
            return $this->returnErrorMessage('Invalid Data',422);
        }
        if($start>$end){
            return $this->returnErrorMessage('End Number Should be greater Start Number',422);
        }
        $count=0;
        for($i=$start;$i<=$end;$i++){
            if(!str_contains((string)$i, '5')){
                $count++;
            }
        }
        return $this->returnData('result',$count,"",200);

    }
    public function alphabetic_index($input){
        if(!!preg_match('/[^A-Z]/', $input)){
         return $this->returnErrorMessage('Only Captial Letters Allow',422);
        }
        $index=0;
        for($i=0;$i<strlen($input);$i++){
            $charcater_index=ord(strtoupper($input[$i])) - ord('A') + 1;
            $index+=pow(26,strlen($input)-($i+1))*$charcater_index;
        }
        return $this->returnData('result',$index,"",200);

    }
    //I put defaults values for N and Q to can be tested with api
    public function get_num_moves_to_be_zeros($N=2,$Q=[3,4]){
        $result=[];
        for($i=0;$i<$N;$i++){
            $result[$i]=0;
            $current_number=$Q[$i];
            while($current_number!=0) {
                if(2>$current_number / 2){
                    $current_number=$current_number-1;
                    $result[$i]++;
                }else {
                    for ($j = 2; $j <= $current_number / 2; $j++) {
                        if ($current_number % $j == 0) {
                            $current_number = $current_number / $j;
                            $result[$i]++;
                            break;
                        } else if ($j + 1 >= $current_number / 2) {
                            $current_number = $current_number - 1;
                            $result[$i]++;
                            break;
                        }
                    }
                }
            }
        }
        return $this->returnData('result',$result,"",200);
    }
}
