<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Application;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Contribution;
use App\Models\Credit;
use App\Models\Fault;
use App\Models\Image;
use App\Models\Item;
use App\Models\Operation;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Program;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\Subtask;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);

        User::factory(4)->create();
        Wallet::factory(5)->create();
        Budget::factory(5)->create();
        Category::factory(5)->create();
        Item::factory(5)->create();
        Post::factory(5)->create();
        Transaction::factory(5)->create();
        Program::factory(5)->create();
        Plan::factory(5)->create();
        Application::factory(5)->create();
        Credit::factory(5)->create();
        Activity::factory(5)->create();
        Fault::factory(5)->create();
        Contribution::factory(5)->create();
        Operation::factory(5)->create();
        Image::factory(5)->create();
        Project::factory(5)->create();
        Sprint::factory(5)->create();
        Task::factory(5)->create();
        Subtask::factory(5)->create();
    }
}
