<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  		// $user = new Role();
		// $user->name         = 'user';
		// $user->display_name = 'User'; // optional
		// $user->description  = 'User'; // optional
		// $user->save();

		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Admin'; // optional
		$admin->description  = 'Admin'; // optional
		$admin->save();

		$user = User::find($id = 1);
		$user->attachRole($admin);

		// $createPost = new Permission();
		// $createPost->name         = 'create-registration1s';
		// $createPost->display_name = 'Create Posts'; // optional
		// // Allow a user to...
		// $createPost->description  = 'create new blog posts'; // optional
		// $createPost->save();

		// $editUser = new Permission();
		// $editUser->name         = 'edit-user';
		// $editUser->display_name = 'Edit Users'; // optional
		// // Allow a user to...
		// $editUser->description  = 'edit existing users'; // optional
		// $editUser->save();
    }
}
