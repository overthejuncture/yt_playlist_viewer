<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO users (name,email,email_verified_at,password,remember_token,created_at,updated_at,refresh_token) VALUES
             ('test','test@test.com',NULL,'$2y$10\$qQ8ppIZb/GJHyctR5BaDgewqt1xfRgej4U50NOfYXrTkT7RXLd94i',NULL,'2023-01-16 00:26:40','2023-01-16 00:27:07','1//0c6puVMWAGILnCgYIARAAGAwSNwF-L9IrLy-tDTcWkCtR-fnDnIwO0VcLSC_bmtljJRryNfDUH4wjZtlswZDxFq7MMCBOYrFOBKE');
        ");
    }
}
