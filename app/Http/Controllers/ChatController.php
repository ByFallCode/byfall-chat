<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Chat;
use App\Models\User;
use App\Notifications\ChatNotification;
use App\Repositories\ChatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Laracasts\Flash\Flash;

class ChatController extends AppBaseController
{
    private $chatRepository;

    public function __construct(ChatRepository $chatRepo)
    {
        $this->chatRepository = $chatRepo;
    }

    function index(Request $request)
    {
        $page_title = "Informations";
        $chats = Chat::where("isDirect", 0)->orderBy("date", "desc")->get();
        $today = (Carbon::now()->formatLocalized('%d-%m-%Y'));

        $users = User::pluck('name', 'id')->all();
        auth()->user()->notifications()->delete();
        return view("chat.index")->with(compact("page_title", "chats", "today", "users"));
    }

    function send(Request $request)
    {
        $page_title = "Informations";
        $chats = Chat::orderBy("date", "desc")->get();
        $today = (Carbon::now()->formatLocalized('%d-%m-%Y'));

        $users = User::pluck('name', 'id')->all();
        auth()->user()->notifications()->delete();
        return view("chat.send")->with(compact("page_title", "chats", "today", "users"));
    }

    function direct(Request $request)
    {
        $page_title = "Informations";
        $chats = Chat::where("user_created", '!=', \auth()->user()->id)->orderBy("date", "desc")->get();
        $today = (Carbon::now()->formatLocalized('%d-%m-%Y'));
        $myDirectMessage = [];

        $users = User::pluck('name', 'id')->all();
        /*foreach ($chats as $chat) {
            foreach ($chat->users as $user) {
                if($user->id === \auth()->user()->id) {
                    array_push($myDirectMessage, $chat);
                }
            }
        }
        $chats = $myDirectMessage;*/
        //dd($chats);
        return view("chat.direct")->with(compact("page_title", "chats", 'myDirectMessage', "today", "users"));
    }

    public function insertMessage(Request $request)
    {
        //dd($request);
        $input = $request->all();

        if($request->users != null) {
            $input['isDirect'] = true;
        }
        $chat = $this->chatRepository->create($input);
        if($request->users != null) {
            $chat->users()->attach($input['users']);
        }

        $path = "";
        if ($request->file('attachment')) {
            $fichier = $request->file('attachment');
            $name = $fichier->getClientOriginalName();
            $fichier->move("fichiers", $name);
            $path = "fichiers/".$name;
            $chat->attachment = $path;
            $chat->save();
        }


        Notification::send(User::all(), new ChatNotification($chat));

        Flash::success('Message publié avec success');

        return redirect(route('chat.index'));
    }

    public function destroy($id)
    {
        //dd($id);
        $chat = $this->chatRepository->find($id);

        if (empty($chat)) {
            Flash::error('Chat not found');

            return redirect(route('chat.index'));
        }

        $chat->forceDelete();

        //$this->chatRepository->delete($id);

        Flash::success('Message supprimé avec succes');

        return redirect(route('chat.index'));
    }
}

