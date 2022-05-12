<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class AddCompanyCammand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'contact:company {name}, {phone=N/A}';
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command To Add Company';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask("What is the name of your Company");
        $phone = $this->ask("What is the Company phone number");

        $this->info($name);
        $this->info($phone);

        if($this->confirm("Are you ready to insert " .$name . "?")){
            $company = Company::create([
                'name' => $name,
                'phone' => $phone,
            ]);
            $this->info("Company Added Successfully " . $company->name);
        }
        else{
            $this->warn("Company not added");
        };
    }
}
