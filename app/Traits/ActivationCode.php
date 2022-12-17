<?php
namespace App\Traits;

trait ActivationCode
{
    public function generateVerificationCode($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $code = '';
        for ($i = 0; $i < $length; $i++) {
          $code .= $characters[rand(0, $charactersLength - 1)];
        }
        return $code;
    }

}
