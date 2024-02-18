<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'backup dtabase';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!Storage::directoryExists("backup")){
            Storage::makeDirectory("backup");
        }

        $filename = "backup_".Carbon::now()->format("Y-m-d").".sql";
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD')
        . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') 
        . "  > " . storage_path() . "/app/backup/" . $filename;
        $out = null;
        $return = null;
        exec($command,$out,$return);
       
    }
}
