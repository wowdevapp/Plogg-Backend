<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public $startDate='';
    public $endDate='';
    public $total;
    public $weekends;
    public $allDays;
    public function __construct(Request $request)
    {
        $this->startDate= $request->startDate;
        $this->endDate= $request->endDate;
        $this->total=$request->total;
    }
    //get all  weekends and assign 0 to them
    public function getAllWekends(){
        $start_day = strtotime($this->startDate);
        $end_day = strtotime($this->endDate);
        $weekEndDays = array();
        $days=0;
        while ($start_day <= $end_day ) {
            if (date("N", $start_day) >=6){
                $weekEnd=date("Y-m-d",$start_day);
                $weekEndDays[$weekEnd]=floatval(0);
            }
            $start_day += 86400;//
            $days++;
        }
        $this->allDays=$days;
        $this->weekends=$weekEndDays;
    }
    public function distrubtAmount(){
        $week_days=$this->allDays-sizeof($this->weekends);
        $start_day = strtotime($this->startDate);
        $end_day = strtotime($this->endDate);
        $total = 0;
        $RandNum = 0;
        $weekday_array = array();
        $rand_array = array();
        $resultArray=array();
        for ($i= 0 ; $i < $week_days ; $i++) {

            $RandNum = mt_rand(1,1000);

            $total += $RandNum;

            array_push($weekday_array , $RandNum);

        }

        $total = floatval($total);

        foreach ( $weekday_array as $opt ) {

            array_push( $rand_array, floatval($opt) / $total);

        }
      $i=0;
        while ($start_day <= $end_day ) {
            if (date("N", $start_day) <6){
                $normalDay=date("Y-m-d",$start_day);
                $resultArray[$normalDay]=floatval($rand_array[$i]*$this->total);
                $i++;
            }

            $start_day += 86400;//
          }

       return $resultArray;
    }

    public function index(){
        $this->getAllWekends();
        $normalDays=$this->distrubtAmount();
        $result=array_merge($this->weekends,$normalDays);
        return view('result')->with(compact('result'));
    }
}
