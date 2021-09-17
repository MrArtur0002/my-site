<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permission();
        $manageUser->name = 'change admin';
        $manageUser->slug = 'change admin';
        $manageUser->save();
        $createTasks = new Permission();
        $createTasks->name = 'game';
        $createTasks->slug = 'game';
        $createTasks->save();
    }
}
