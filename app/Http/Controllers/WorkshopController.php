<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Workshop;
use App\Repositories\WorkShopRepository;
use Illuminate\Http\Request;
use Lordjoo\Crudi\Traits\CrudiControllerTrait;

class WorkshopController extends Controller
{
    use CrudiControllerTrait;
    private $model = Workshop::class;
    private $route = "workshops";
    private $custom_views = [
        'all'=>"workshops.all",
        'create'=>"workshops.all",
        "update"=>"workshops.all",
    ];

    public function all(Request $request,WorkShopRepository  $workShopRepository)
    {
        $createRoute = route($this->route.'.create');
        $data = $workShopRepository->showByMonth($request);
        return view($this->custom_views['all'],compact('data','createRoute'));
    }

    public function beforeStore(Request $request): array
    {
        $obj = $request->all();
        $obj['trainer_id'] = auth()->id();
        return $obj;
    }

    public function show($id)
    {
        $item = Workshop::findOrFail($id);
        $registered = Registration::where("user_id",auth()->id())->where("workshop_id",$id)->first();
        return view('workshops.single',compact('item','registered'));
    }



}
