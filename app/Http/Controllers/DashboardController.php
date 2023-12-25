<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data tugas.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        // Mengumpulkan data untuk ditampilkan di dashboard
        $data = [
            // Judul halaman
            "title" => "Dashboard",

            // Mengambil semua tugas pengguna yang berdeadline hari ini
            "tasks" => \App\Models\Task::query()
                ->where('user_id', auth()->user()->user_id)
                ->where('deadline', date('Y-m-d'))
                ->get(),

            // Menghitung total jumlah tugas pengguna
            "total_task" => Task::query()
                ->where('user_id', auth()->user()->user_id)
                ->count(),

            // Menghitung jumlah tugas yang belum selesai (bukan status 'DONE')
            "undone_task" => Task::query()
                ->where('user_id', auth()->user()->user_id)
                ->whereNot('status', 'DONE')
                ->count()
        ];

        // Mengembalikan view dashboard dengan data yang telah dikumpulkan
        return view('dashboard.index', $data);
    }
}
