<?php


class math
{

    public function __construct()
    {
        return true;
    }

    public function sum(...$values){
        $tmp = 0;
        foreach($values as $value){
            if(is_integer($value) || is_float($value)) {
                $tmp += $value;
            }
        }
        return $tmp;
    }

    public function decimal($value){
        if(is_integer($value) || is_float($value)) {
            return $value;
        } elseif(is_string($value)) {
            $value = str_replace(",", ".", $value);
            $t = floatval($value);
            if("$t" == $value){
                return $t;
            }
        }
        return null;
    }

    public function is_even($value){
        if($value%2 == 0){
            return true;
        }
        return false;
    }

    public function average(...$values){
        $count = count($values);
        $tmp = 0;
        foreach($values as $value){
            if(is_integer($value) || is_float($value)) {
                $tmp += $value;
            }
        }
        return $tmp/$count;
    }

    public function median(...$values){
        $arr = array();
        foreach($values as $value){
            $arr[] = $value;
        }
        $num = count($arr);
        $middleVal = floor(($num - 1) / 2);
        //If the size of the array is an odd number,
        //then the middle value is the median.
        if($num % 2) {
            return $arr[$middleVal];
        }
        //If the size of the array is an even number, then we
        //have to get the two middle values and get their
        //average
        else {
            //The $middleVal var will be the low
            //end of the middle
            $lowMid = $arr[$middleVal];
            $highMid = $arr[$middleVal + 1];
            //Return the average of the low and high.
            return (($lowMid + $highMid) / 2);
        }
    }

    /**
     * @param $lat1
     * @param $lon1
     * @param $lat2
     * @param $lon2
     * @param string $unit K, M or N
     * @return float
     */
    public function distance($lat1, $lon1, $lat2, $lon2, $unit = "K") {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    public function is_numbers(...$values){
        foreach($values as $value){
            if(!is_integer($value) && !is_float($value)){
                return false;
            }
        }
        return true;
    }

    public function pythagoras($a, $b){



    }


}