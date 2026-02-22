<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('categories')->upsert([
            [
                'name' => 'Object Oriented Programming',
                'slug' => 'object-oriented-programming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Applied Software Project Management',
                'slug' => 'applied-software-project-management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Server-side Development',
                'slug' => 'server-side-development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['slug'], ['name', 'updated_at']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->whereIn('slug', [
            'object-oriented-programming',
            'applied-software-project-management',
            'server-side-development',
        ])->delete();
    }
};
