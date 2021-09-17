<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $user = Role::where('slug', 'user')->first();
        $createTasks = Permission::where('slug','change admin')->first();
        $manageUsers = Permission::where('slug','game')->first();
        $user1 = new User();
        $user1->name = 'Artur Davletshin';
        $user1->email = 'smiteartur01@mail.ru';
        $user1->password = bcrypt('12345678');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($createTasks);
        $user2 = new User();
        $user2->name = 'Test User';
        $user2->email = 'test@mail.ru';
        $user2->password = bcrypt('12345678');
        $user2->save();
        $user2->roles()->attach($user);
        $user2->permissions()->attach($manageUsers);
    }
}
