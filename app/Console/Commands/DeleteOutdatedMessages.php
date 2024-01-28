<?php

namespace App\Console\Commands;

use App\Models\Message;
use Illuminate\Console\Command;

class DeleteOutdatedMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-outdated-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all messages that are outdated (expires_at < now)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Deleting outdated messages...');

        $deleted = Message::where('expires_at', '<', now())->delete();

        $this->info('Deleted ' . $deleted . ' outdated messages.');
    }
}
