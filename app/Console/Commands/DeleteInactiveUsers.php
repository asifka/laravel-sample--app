<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will delete all inactive users';

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
     * @return int
     */
    public function handle()
    {
        User::where('status',0)->delete();
       //$name= $this->argument($name);
    //    $name=$this->ask('What is your name');
    //    $password=$this->secret('What is your name');
    //    if($this->confirm('Are you want to delete this user?')){
    //             dd('Yes Proceed');
    //    }
    //    $name=$this->anticipate('What is your name ?',['Asif','Binu']);
    //    $this->info('This is a message');
    //    $this->error('This is a error message');
    //    User::where('name',$name)->get();
       // dd($name);
      // User::where('status',0)->restore();
    }
}
