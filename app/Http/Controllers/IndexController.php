<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function checks()
    {
        $users = User::query()->orderBy("created_at", "DESC")->paginate(5);

        $checks = Check::query()->orderBy("created_at", "DESC")->paginate(5);


        $dates = [];

        for ($i=0, $i<=6; $i++;) {
            $dates = Carbon::now()->subDays($i)->format('Y-m-d');
        }

        $data = Check::whereIn('created_at', $dates)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as "count"')
            ))
            ->keyBy('date');

        return view('welcome', [
            "users" => $users,
            "checks" => $checks,
            'dates' => $dates,
            'data' => $data,
        ]);
    }

    public function index()
    {
        return view('index');
    }
}
