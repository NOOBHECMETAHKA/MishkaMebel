<?php

namespace App\Console\Commands;

use App\Models\Status;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ttt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $data = User::all();
//        $this->info($data->toJson());
        DB::table(User::$tableName)->insert([
            [
                'email' => 'admin@admin.ru',
                'role' => 'admin',
                'password' => Hash::make('Password123'),
            ],
            [
                'email' => 'manager@manager.ru',
                'role' => 'manager',
                'password' => Hash::make('Password123'),
            ]
        ]);
    }
}
