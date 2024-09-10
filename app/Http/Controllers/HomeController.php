<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\InitParam;
use App\Models\Programme;
use App\Models\User;
use http\Params;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = "Tableau de bord";


        $query = "SELECT MONTH(created_at) AS mois, SUM(montant) AS montant FROM depenses GROUP BY MONTH(created_at)";

        $depenses = DB::select($query);

        //  dd($depenses);

        return view('admin.index')->with(compact('page_title', 'depenses'));
    }

    public function home()
    {
        $page_title = "Informations";
        $chats = Chat::where("isDirect", 1)->orderBy("date", "desc")->get();
        $today = (Carbon::now()->formatLocalized('%d-%m-%Y'));
        $myDirectMessage = [];

        $users = User::pluck('name', 'id')->all();
        foreach ($chats as $chat) {
            foreach ($chat->users as $user) {
                if($user->id == \auth()->user()->id) {
                    array_push($myDirectMessage, $chat);
                }
            }
        }
        $chats = $myDirectMessage;
        auth()->user()->notifications()->delete();
        return view("chat.index")->with(compact("page_title", "chats", "today", "users"));
    }

    public function back()
    {
        return back();
    }
}
