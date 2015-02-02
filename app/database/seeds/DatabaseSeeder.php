<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Lesson::truncate();

        Tag::truncate();

        DB::table('lesson_tag')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        


		Eloquent::unguard();

		$this->call('LessonsTableSeeder');

        $this->call('TagsTableSeeder');

        $this->call('LessonsTagTableSeeder');
	}


}
