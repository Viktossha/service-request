<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(): View
    {
        return view('applications.index', [
            'applications' => Application::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        Application::create($validated);

        return redirect()
            ->route('services')
            ->with('success', 'Application submitted successfully.');
    }
}
