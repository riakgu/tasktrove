<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Menampilkan daftar tugas.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Mengambil semua tugas pengguna yang sedang login
        $data = [
            "title" => "Tasks",
            'tasks' => Task::query()->where('user_id', auth()->user()->user_id)->get(),
        ];

        // Mengembalikan view daftar tugas dengan data yang diperoleh
        return view('tasks.index', $data);
    }

    /**
     * Menampilkan formulir untuk membuat tugas baru.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data = [
            "title" => "Create Task",
        ];

        // Mengembalikan view formulir pembuatan tugas
        return view('tasks.create', $data);
    }

    /**
     * Menyimpan tugas baru ke dalam database.
     *
     * @param Request $request Data request dari formulir.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input formulir
        $validated = $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'started' => 'required',
            'deadline' => 'required|after_or_equal:started',
            'status' => 'required',
        ]);

        // Menambahkan user_id ke data yang divalidasi
        $validated['user_id'] = auth()->user()->user_id;

        // Membuat tugas baru
        Task::query()->create($validated);

        // Redirect kembali ke daftar tugas dengan pesan sukses
        return redirect('/tasks')->with('success', 'Task has been created!' );
    }

    /**
     * Menampilkan tugas tertentu.
     *
     * @param Task $task Tugas yang akan ditampilkan.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Task $task)
    {
        $data = [
            'title' => 'Show Task',
            'task' => $task,
        ];

        // Mengembalikan view detail tugas
        return view('tasks.show', $data);
    }

    /**
     * Menampilkan formulir untuk mengedit tugas tertentu.
     *
     * @param Task $task Tugas yang akan diedit.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Task $task)
    {
        $data = [
            'title' => 'Edit Task',
            'task' => $task,
        ];

        // Mengembalikan view formulir edit tugas
        return view('tasks.edit', $data);
    }

    /**
     * Memperbarui tugas tertentu di dalam database.
     *
     * @param Request $request Data request dari formulir.
     * @param Task $task Tugas yang akan diperbarui.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        // Validasi input formulir
        $validated = $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'started' => 'required',
            'deadline' => 'required|after_or_equal:started',
            'status' => 'required',
        ]);

        // Menambahkan user_id ke data yang divalidasi
        $validated['user_id'] = auth()->user()->user_id;

        // Memperbarui tugas
        $task::query()->where('task_id', $task->task_id)
            ->update($validated);

        // Redirect kembali ke daftar tugas dengan pesan sukses
        return redirect('/tasks')->with('success', 'Task has been updated!' );
    }

    /**
     * Menghapus tugas tertentu dari database.
     *
     * @param Task $task Tugas yang akan dihapus.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        // Menghapus tugas
        Task::destroy($task->task_id);

        // Redirect kembali ke daftar tugas dengan pesan sukses
        return redirect('/tasks')->with('success', 'Task has been deleted!' );
    }
}
