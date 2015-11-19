<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
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
        $users =  [1,2,3,4,5,6,8,9,10];
        $this->output->progressStart(count($users));

        foreach ($users as $user) {
            sleep(1);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
    }
}
