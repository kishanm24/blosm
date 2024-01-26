<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function search($search)
    {
        $this->where('name', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->orWhere('mobile_number', 'LIKE', '%'.$search.'%');
    }

    public function status($status) {
        $this->where('status', $status);
    }

    // public function date($date) {

    //     if(strlen($date) > 15) {
    //         list($start, $end) = explode(' to ', $date);
    //         $fromDate = Carbon::parse($start)->format('Y-m-d');
    //         $toDate = Carbon::parse($end)->format('Y-m-d');
    //         $this->where('date', '>=', $fromDate)->where('date', '<=',$toDate);
    //     } else {
    //         $date = Carbon::parse(($date))->format('Y-m-d');
    //         $this->where('date', $date);
    //     }

    // }
}
