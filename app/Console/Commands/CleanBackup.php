<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;
use App\Models\Backup;

class CleanBackup extends Command
{
    protected $signature = 'kobiyim:clean-backup';

    protected $description = 'Veritabanının yedeğini alın';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $files =   Storage::allFiles(storage_path('app/backup'));

            Storage::delete($files);

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
