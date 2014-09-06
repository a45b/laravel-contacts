<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		//$this->call('UserTableSeeder');
		//$this->command->info('User table seeded!');

		$this->call('ContactsTableSeeder');
		$this->command->info('Contacts table seeded!');
	}
}
/*
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        
        User::create(array('email' => 'foo@bar.com', 'password'=> Hash::make('demo')));
    }

}
*/
class ContactsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('contacts')->delete();
        
        Contact::create(array('name' => 'Kamal Dev', 'email' => 'foo@bar.com', 'mobile'=> '8011877042'));
    }

}