<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin')) {
            // The current user is an admin
            return view('sla');
        }

        abort(403, 'Unauthorized action.');
    }
}