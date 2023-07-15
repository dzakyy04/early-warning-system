<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HolidayController extends Controller
{
    public function index()
    {
        $title = 'Hari libur';
        $holidays = Holiday::orderBy('holiday_date', 'asc')->get();

        $holidays->map(
            function ($item) {
                $item->holiday_date = Carbon::createFromFormat('Y-m-d', $item->holiday_date)->locale('id')->isoFormat('D MMMM YYYY');
            }
        );

        return view('hari-libur.index', compact('title', 'holidays'));
    }
}
