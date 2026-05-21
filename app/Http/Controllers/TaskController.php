<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // ADMIN
        if (auth()->user()->role == 'admin') {

            $tasks = Task::with('user')
                        ->latest()
                        ->get();

            $users = User::where('role', 'user')->get();

            return view('admin.dashboard', compact('tasks', 'users'));
        }

        // USER
        $tasks = Task::where('user_id', auth()->id())
                    ->latest()
                    ->get();

        return view('dashboard', compact('tasks'));
    }

    /*
    |--------------------------------------------------------------------------
    | USER UPLOAD PDF
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'required|mimes:pdf|max:2048',
        ]);

        // Upload PDF
        $fileName = null;

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();

            $file->storeAs('tasks', $fileName, 'public');
        }

        // Simpan database
        Task::create([
            'user_id' => auth()->id(),
            'title'   => $request->title,
            'file'    => 'tasks/'.$fileName,
        ]);

        return redirect()->back()
            ->with('success', 'PDF berhasil dikirim!');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN KIRIM PDF KE USER
    |--------------------------------------------------------------------------
    */

    public function adminStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title'   => 'required|string|max:255',
            'file'    => 'required|mimes:pdf|max:2048',
        ]);

        // Upload PDF
        $fileName = null;

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $fileName = time().'_'.$file->getClientOriginalName();

            $file->storeAs('tasks', $fileName, 'public');
        }

        // Simpan database
        Task::create([
            'user_id' => $request->user_id,
            'title'   => $request->title,
            'file'    => 'tasks/'.$fileName,
        ]);

        return redirect()->back()
            ->with('success', 'PDF berhasil dikirim ke user!');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->back()
            ->with('success', 'Tugas berhasil dihapus!');
    }
}