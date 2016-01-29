<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Http\Controllers\RequestNotification;
use App\Models\Promotion;
use DB;

class CronPromociones extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'cronPromociones';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
      
    }
    
}
