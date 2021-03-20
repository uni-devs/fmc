<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Workshop;
use App\Repositories\WorkShopRepository;
use Illuminate\Http\Request;
use Lordjoo\Crudi\Traits\CrudiControllerTrait;

class WorkshopController extends Controller
{
    use CrudiControllerTrait;
    private $model = Workshop::class;
    private $route = "admin.workshops";
    private $custom_views = [
        'all'=>"admin.workshops.all",
        'create'=>"admin.workshops.all",
        "edit"=>"admin.workshops.edit",
    ];

    public function all(Request $request,WorkShopRepository  $workShopRepository)
    {
        if ($request->query('month') && $request->query('month') == 'all') {
            $data = $this->model::all();
        } else {
            $data = $workShopRepository->showByMonth($request);

        }
        return view($this->custom_views['all'],compact('data'));
    }

    public function show($id)
    {
        $item = Workshop::findOrFail($id);
        $regs = Registration::where("workshop_id",$id)->get();
        return view('admin.workshops.single',compact('item','regs'));
    }

    public function delete($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return redirect()->back()->with(['status' => true,'msg'=>"تم الحذف بنجاح"]);
    }



}
