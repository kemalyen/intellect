<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('roles');

        $roles = [
            [
                'name'       => 'administrator',
                'display_name'  => 'Administrator',
                'all'        => true,
                'sort'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'customer',
                'display_name'  => 'CUSTOMER',
                'all'        => false,
                'sort'       => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}