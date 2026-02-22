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
        $timestamp = now();

        $categories = [
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'Database', 'slug' => 'database'],
            ['name' => 'Frontend', 'slug' => 'frontend'],
            ['name' => 'DevOps', 'slug' => 'devops'],
            ['name' => 'JavaScript', 'slug' => 'javascript'],
            ['name' => 'TypeScript', 'slug' => 'typescript'],
            ['name' => 'React', 'slug' => 'react'],
            ['name' => 'Vue', 'slug' => 'vue'],
            ['name' => 'Node.js', 'slug' => 'nodejs'],
            ['name' => 'APIs', 'slug' => 'apis'],
            ['name' => 'Authentication', 'slug' => 'authentication'],
            ['name' => 'Authorization', 'slug' => 'authorization'],
            ['name' => 'Security', 'slug' => 'security'],
            ['name' => 'Testing', 'slug' => 'testing'],
            ['name' => 'Performance', 'slug' => 'performance'],
            ['name' => 'Debugging', 'slug' => 'debugging'],
            ['name' => 'Deployment', 'slug' => 'deployment'],
            ['name' => 'Docker', 'slug' => 'docker'],
            ['name' => 'CI/CD', 'slug' => 'cicd'],
            ['name' => 'Cloud', 'slug' => 'cloud'],
            ['name' => 'MySQL', 'slug' => 'mysql'],
            ['name' => 'PostgreSQL', 'slug' => 'postgresql'],
            ['name' => 'Redis', 'slug' => 'redis'],
            ['name' => 'Caching', 'slug' => 'caching'],
            ['name' => 'Eloquent', 'slug' => 'eloquent'],
            ['name' => 'Blade', 'slug' => 'blade'],
            ['name' => 'UX/UI', 'slug' => 'ux-ui'],
            ['name' => 'Architecture', 'slug' => 'architecture'],
            ['name' => 'Design Patterns', 'slug' => 'design-patterns'],
            ['name' => 'Refactoring', 'slug' => 'refactoring'],
            ['name' => 'Tutorials', 'slug' => 'tutorials'],
            ['name' => 'Tips and Tricks', 'slug' => 'tips-and-tricks'],
            ['name' => 'Career', 'slug' => 'career'],
            ['name' => 'Open Source', 'slug' => 'open-source'],
            ['name' => 'Git', 'slug' => 'git'],
            ['name' => 'Linux', 'slug' => 'linux'],
            ['name' => 'Mobile', 'slug' => 'mobile'],
            ['name' => 'AI', 'slug' => 'ai'],
            ['name' => 'Data Structures', 'slug' => 'data-structures'],
            ['name' => 'Algorithms', 'slug' => 'algorithms'],
        ];

        $rows = array_map(static function (array $category) use ($timestamp): array {
            return [
                'name' => $category['name'],
                'slug' => $category['slug'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }, $categories);

        DB::table('categories')->upsert(
            $rows,
            ['slug'],
            ['name', 'updated_at']
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->whereIn('slug', [
            'laravel',
            'php',
            'database',
            'frontend',
            'devops',
            'javascript',
            'typescript',
            'react',
            'vue',
            'nodejs',
            'apis',
            'authentication',
            'authorization',
            'security',
            'testing',
            'performance',
            'debugging',
            'deployment',
            'docker',
            'cicd',
            'cloud',
            'mysql',
            'postgresql',
            'redis',
            'caching',
            'eloquent',
            'blade',
            'ux-ui',
            'architecture',
            'design-patterns',
            'refactoring',
            'tutorials',
            'tips-and-tricks',
            'career',
            'open-source',
            'git',
            'linux',
            'mobile',
            'ai',
            'data-structures',
            'algorithms',
        ])->delete();
    }
};
