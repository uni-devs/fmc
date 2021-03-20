<?php


namespace App\Repositories;


use App\Models\Workshop;
use Carbon\Carbon;

class WorkShopRepository
{
    public function showByMonth($request)
    {
        if ($request->query("month")) {
            $month = $request->query("month");
        } else {
            $month = Carbon::now()->month;
        }
        $data = Workshop::whereMonth("date_from",$month)->paginate(15);
        return $data;
    }
}
