<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NewAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New admin';

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
        $name  = $this->ask("Admin Account Name ?");
        $email = $this->ask("Admin Account Email ?");
        $pass  = $this->ask("Admin Account Password ?");
        $admin = Admin::create([
            'name'              => $name ?? "SuperAdmin",
            'email'             => $email,
            'password'          => bcrypt($pass),
            'email_verified_at' => Carbon::now(),
        ]);
        $this->info('Account Created');
        $this->info("Email:$email");
        $this->info("Password:$pass");
        return true;
    }
}
