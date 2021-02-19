<?php

use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Admin::create([
            'name'=>'Super Admin',
            'email'=>'admin@app.com',
            'password'=>bcrypt('12345678')
        ]);
    }
}
