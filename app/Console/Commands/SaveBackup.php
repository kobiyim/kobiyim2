<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;
use App\Models\Backup;

class SaveBackup extends Command
{
    protected $signature = 'kobiyim:save-backup';

    protected $description = 'Veritabanının yedeğini alın';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $filename = randomSqlName();

            MySql::create()
                ->setDbName(env('DB_DATABASE'))
                ->setUserName(env('DB_USERNAME'))
                ->setPassword(env('DB_PASSWORD'))
                ->includeTables(env('BACKUPTABLES'))
                ->dumpToFile(storage_path('app/backup/'.$filename.'.sql'));

            Backup::create([
                'file'  => $filename,
                'uploaded'  => 0
            ]);

            connectToKobiyim([
                'job'    => 'save-backup-status',
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            connectToKobiyim([
                'job'     => 'save-backup-status',
                'status'  => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
