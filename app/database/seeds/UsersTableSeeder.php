<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    protected $table = 'users';

    public function run()
    {
        DB::table($this->table)->insert([
            'user_name' => 'cesarcappetto@gmail.com',
            'password' => '$2y$10$.mfnyJTDGKrNx599Z4/jwefKPhl.NN8vDPqtsB5sUgWLXtHlf3vM2', // admin
            'email' => 'cesarcappetto@gmail.com',
            'first_name' => 'Cesar',
            'last_name' => 'Cappetto',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table($this->table)->insert([
            'user_name' => 'fede333lago@gmail.com',
            'password' => '$2y$10$.mfnyJTDGKrNx599Z4/jwefKPhl.NN8vDPqtsB5sUgWLXtHlf3vM2', // admin
            'email' => 'fede333lago@gmail.com',
            'first_name' => 'Federico',
            'last_name' => 'Lago',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
