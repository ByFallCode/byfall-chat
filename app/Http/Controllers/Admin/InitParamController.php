<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInitParamRequest;
use App\Http\Requests\UpdateInitParamRequest;
use App\Models\InitParam;
use App\Repositories\InitParamRepository;
use App\Http\Controllers\AppBaseController;
use FontLib\Table\Type\name;
use http\Params;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;


class InitParamController extends Controller
{
    private $title;

    public function __construct()
    {
        $this->title = "Paramètrage";
    }


    public function index(Request $request)
    {
        $initParam = InitParam::find(1);
        return view('init_params.index')->with(compact("initParam"))
            ->with('page_title', $this->title);
    }


    public function update(Request $request)
    {
//  dd($request);
        $initParam = InitParam::find(1);
        if($request->tva == "on") {
            $initParam->tva = true;
            $initParam->save();
        }elseif (!isset($request->tva)){
            $initParam->tva = false;
            $initParam->save();
        }
        if($request->num_last_fact != null) {
            $initParam->num_last_fact = $request->num_last_fact;
            $initParam->first = true;
            $initParam->save();
        }
        $path = "";
        if ($request->file('logo')) {
            $logo = $request->file('logo');
            $name = $logo->getClientOriginalName();
            $logo->move("images", $name);
            $path = "images/".$name;
            $initParam->logo = $path;
            $initParam->save();
        }

        //dd($request->except(['_token', 'logo']));
        $initParam = InitParam::where('id', $initParam->id)->update($request->except(['_token', 'logo', 'tva']));

        Flash::success('Paramatre mise à jour avec succes.');

        return redirect(route('initParams.index'));
    }

}
