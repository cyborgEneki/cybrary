<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\WeeklyReportMailable;
use Carbon\Carbon;
use App\Models\BookUser;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class WeeklyReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a weekly report to system administrators';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dt = Carbon::today();
        $dtString = Carbon::today()->toDateString();

        $to = $dt->subDays(7);
        $toString = $to->toDateString();

        $booksBorrowed = BookUser::select('date_out')->whereBetween('date_out', [$toString, $dtString])->get()->count();
        $booksReturned = BookUser::select('date_in')->whereBetween('date_in', [$toString, $dtString])->get()->count();
        
        $dt->subDays(3);
        $upperDate = $dt->toDateString();

        $suspendedUsers = BookUser::where('date_in', null)->where('due_date', '<', $upperDate)->count();
    
        Mail::to(User::where('accesslevel_id', 1)->get()->pluck('email'))->send(new WeeklyReportMailable($booksBorrowed, $booksReturned, $suspendedUsers)); 
    }
}
