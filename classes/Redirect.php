<?php


class Redirect{

    public static function to($localtion = null){
            if($localtion){

                header('Location: ' . $localtion);
                exit();
            }
    }

}