<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $page_title = "Tableau de bord";
        return view('admin.index', compact('page_title'));
    }
}
