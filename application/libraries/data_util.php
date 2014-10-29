<?php

class Data_util {

    public function converteData($data) {
        if (!empty($data)) {
            $data = substr($data, 0, 10);
            $data = str_replace("-", "/", $data);
            $dt = explode("/", $data);
            return $dt[2] . '/' . $dt[1] . '/' . $dt[0];
        } else {
            return NULL;
        }
    }
    
    public function getDay($data) {
        if (!empty($data)) {
            $data = substr($data, 0, 10);
            $data = str_replace("-", "/", $data);
            $dt = explode("/", $data);
            return $dt[2];
        } else {
            return NULL;
        }
    }
    
    public function getShortMonthTextual($data) {
        $data = substr($data, 0, 10);
        $data = str_replace("-", "/", $data);
        $dt = explode("/", $data);
        
        //return date("M", mktime(0, 0, 0, $dt[1], $dt[2], $dt[0]));
        //echo ">>>>>>>>>>>>>>>> " . date("M", mktime(0, 0, 0, $dt[1]));
        return date("M", mktime(0, 0, 0, $dt[1]));
    }

}