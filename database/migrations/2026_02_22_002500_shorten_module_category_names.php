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
        DB::table('categories')
            ->where('slug', 'object-oriented-programming')
            ->update([
                'name' => 'OOP',
                'updated_at' => now(),
            ]);

        DB::table('categories')
            ->where('slug', 'applied-software-project-management')
            ->update([
                'name' => 'Project Mgmt',
                'updated_at' => now(),
            ]);

        DB::table('categories')
            ->where('slug', 'server-side-development')
            ->update([
                'name' => 'Server-side Dev',
                'updated_at' => now(),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')
            ->where('slug', 'object-oriented-programming')
            ->update([
                'name' => 'Object Oriented Programming',
                'updated_at' => now(),
            ]);

        DB::table('categories')
            ->where('slug', 'applied-software-project-management')
            ->update([
                'name' => 'Applied Software Project Management',
                'updated_at' => now(),
            ]);

        DB::table('categories')
            ->where('slug', 'server-side-development')
            ->update([
                'name' => 'Server-side Development',
                'updated_at' => now(),
            ]);
    }
};
