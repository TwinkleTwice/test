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

        $checks = Check::query()->select()->whereBetween('created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

        return view('welcome', [
            'users' => $users,
            'checks' => $checks,
        ]);
    }

    public function index()
    {
        return view('index');
    }
}
