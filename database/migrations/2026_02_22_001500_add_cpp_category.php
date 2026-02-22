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
                'name' => 'C++',
                'slug' => 'cpp',
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
        DB::table('categories')->where('slug', 'cpp')->delete();
    }
};
