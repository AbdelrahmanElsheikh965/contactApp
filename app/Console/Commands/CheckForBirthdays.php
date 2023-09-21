<?php

namespace App\Console\Commands;

use App\Models\Person;
use Illuminate\Console\Command;

class CheckForBirthdays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'abdo:birthday_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test this command for birthday check';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Test (Get the first_name) of a person who is just born today in the current month if found !?
        $people = Person::whereMonth('birthday', '=', now()->format('m'))
                            ->whereDay('birthday', '=', now()->format('d'))
                            ->pluck('first_name');
        dd($people);
    }
}

