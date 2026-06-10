<?php

namespace App\Console\Commands;
use App\Services\PeriodService;
use Illuminate\Console\Command;

class OpenMonthlyPeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'period:open';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create current payroll and kpi period if not exist';

    /**
     * Execute the console command.
     */
    public function handle(PeriodService $periodService):int
    {
        $period = $periodService->ensureCurrentPeriodExists();
        $this->info("Period {$period->bulan}/{$period->tahun} ready.");
        return self::SUCCESS;
    }
}
