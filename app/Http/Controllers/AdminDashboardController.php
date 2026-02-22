<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics.
     */
    public function index(): View
    {
        $stats = [
            'admins' => $this->countTable('admins'),
            'users' => $this->countTable('users'),
            'posts' => $this->countTable('posts'),
            'comments' => $this->countTable('comments'),
            'categories' => $this->countTable('categories'),
        ];

        $latestPosts = [];

        if (Schema::hasTable('posts')) {
            $latestPosts = DB::table('posts')
                ->select('id', 'title', 'created_at')
                ->latest('created_at')
                ->limit(5)
                ->get();
        }

        return view('admin.dashboard', [
            'stats' => $stats,
            'latestPosts' => $latestPosts,
        ]);
    }

    /**
     * Log out an admin session.
     */
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(['admin_id', 'admin_name']);

        return redirect()->route('login')->with('success', 'Admin logged out successfully.');
    }

    /**
     * Count rows in a table safely.
     */
    private function countTable(string $table): int
    {
        if (! Schema::hasTable($table)) {
            return 0;
        }

        return DB::table($table)->count();
    }
}
