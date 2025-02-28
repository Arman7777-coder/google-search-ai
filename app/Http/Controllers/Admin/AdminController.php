<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.dashboard');
    }
}
