<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Events\NewMessage;

class DemoController extends Controller
{
    public function index()
    {
        return Inertia::render('Attendance/Index');
    }
}
