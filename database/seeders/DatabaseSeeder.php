<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Item::factory(10)->create();

         $default = Tenant::create([
             'id' => 'default',
             'primary_color' => 'indigo',
             'logo' => 'ApplicationLogo',
         ]);
        $default->domains()->create(['domain' => 'zest-code-item-viewer.test']);

         $harry = Tenant::create([
             'id' => 'harry',
             'primary_color' => 'red',
             'logo' => 'ApplicationLogo2'
         ]);
         $harry->domains()->create(['domain' => 'harry.zest-code-item-viewer.test']);
    }
}
