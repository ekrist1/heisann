<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Message;
use App\File;
use Carbon\Carbon;

class DeleteExpiredMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteExpiredMessages:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove expired messages (older then 30 days)';

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
        Message::FindExpired()->delete();
        File::FindExpired()->delete();
    }
}
