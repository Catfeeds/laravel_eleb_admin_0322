<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class NavController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getNavHtml()
    {
        $html = '';
        foreach (Nav::where('pid', 0)->get() as $v) {
            $children_html='';
            foreach (Nav::where('pid',$v->id)->get() as $k) {
//                dd($k->permission->name);
//                if(auth()->user()->can($k->permission->name)){

                    $children_html .= '<li><a href="' . route($k->url). '">' . $k->name . '</a></li>';
//                }

            }
            if(empty($children_html)){
                continue;
            }
            $html .= '<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $v->name . '<span class="caret"></span></a>
                    <ul class="dropdown-menu">';

            $html.=$children_html;
            $html .= '</ul></li>';
        }
        return $html;
    }


    public function index()
    {
        $navs = Nav::all();
        return view('navs/index', compact('navs'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $navs = Nav::all();
        return view('navs/create', compact('navs', 'permissions'));
    }

    public function store(Request $request)
    {
        //dd($request->name);
        $this->validate($request,
            [
                'name' => 'required',
                'url' => 'required',
//                'permission_id'=>'required',
            ],
            [
                'name.required' => "菜单名不能为空",
                'url.required' => "路由地址不能为空",
//                'permission_id.required'=>"权限不能为空",
            ]);


        Nav::create([
            'name' => $request->name,
            'url' => $request->url,
            'permission_id' => $request->permission_id,
            'pid' => $request->pid,
        ]);

        return redirect()->route('navs.index')->with("success", "添加成功");
    }

    public function destroy(Nav $nav)
    {
        $nav->delete();
        return redirect()->route('navs.index')->with("success", "删除成功");
    }

    public function edit(Nav $nav)
    {
        $permissions = Permission::all();
        $navs = Nav::all();
        return view('navs/edit', compact('nav', 'permissions', 'navs'));
    }

    public function update(Request $request, Nav $nav)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'url' => 'required',
                'permission_id' => 'required',
            ],
            [
                'name.required' => "菜单名不能为空",
                'url.required' => "路由地址不能为空",
                'permission_id.required' => "权限不能为空",
            ]);
        $nav->update([
            'name' => $request->name,
            'url' => $request->url,
            'permission_id' => $request->permission_id,
            'pid' => $request->pid,
        ]);
        return redirect()->route('navs.index')->with("success", "修改成功");
    }
}
