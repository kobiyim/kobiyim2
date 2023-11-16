<?php

namespace Kobiyim\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;
use Kobiyim\Models\Backup;

class UploadBackup extends Command
{
    protected $signature = 'kobiyim::upload-backup';

    protected $description = 'Veritabanının yedeğini alın';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $allFile = Backup::where('uploaded', 0)->get();

            foreach($allFile as $e) {
                \Storage::disk('digitalocean')->put(env('KOBIYIMUSERNAME') . '/' . $e->created_at->format('Ymd-Hi') . '.sql', \File::get(storage_path('app/backup/' . $e->file . '.sql')));

                $e->upload([
                    'uploaded'  => 1
                ]);
            }

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
