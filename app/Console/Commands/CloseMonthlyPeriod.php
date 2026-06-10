<?php

namespace App\Console\Commands;
use App\Models\Period;
use Illuminate\Console\Command;

class CloseMonthlyPeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'period:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To set the status of the month CLOSED if that month has changed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Period::where('status','open')->where('bulan',now()->subMonth()->month)
        ->where('tahun',now()->subYear()->year)->update(['status'=>'closed']);
        
    }
}
