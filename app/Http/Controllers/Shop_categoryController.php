<?php

namespace App\Http\Controllers;

use App\Models\Shop_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Shop_categoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $shop_category=Shop_category::all();
        return view('shop_category/index',compact('shop_category'));
    }

    public function create()
    {
        return view('shop_category/create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'img'=>'required',
            'status'=>'required'
        ],[
            'name.require'=>'分类名不能为空',
            'img.require'=>'分类图片不能为空',
            'status.require'=>'状态不能为空'
        ]);
        //$file=$request->img;
        $storage=Storage::disk('oss');
        $fileName=$storage->putFile('shop_category',$request->img);


        //$fileName=$file->store('public/img');
        Shop_category::create(['name'=>$request->name,'img'=>$storage->url($fileName),'status'=>$request->status]);

            session()->flash('success',"添加成功");
            return redirect()->route('shop_categorys.index');
    }

    public function edit(Shop_category $shop_category)
    {
        return view('shop_category/edit',compact('shop_category'));
    }

    public function update(Request $request,Shop_category $shop_category)
    {
        $this->validate($request,[
            'name'=>'required',
            'img'=>'required',
            'status'=>'required'
        ],[
            'name.require'=>'分类名不能为空',
            'img.require'=>'分类图片不能为空',
            'status.require'=>'状态不能为空'
        ]);

        if(!empty($request->img)){
            $storage=Storage::disk('oss');
            $fileName=$storage->putFile('shop_category',$request->img);
            $shop_category->update([
                'name'=>$request->name,
                'status'=>$request->status,
                'img'=>$storage->url($fileName)
            ]);

        }else{
            $shop_category->update([
                'name'=>$request->name,
                'status'=>$request->status
            ]);
        }
        session()->flash('success','修改成功');
        return redirect()->route('shop_categorys.index');

    }

    public function destroy(Shop_category $shop_category)
    {

        $id=$shop_category->id;
        $res=DB::select("select count(*) from shop_categoryies where id={$id}");
        if ($res==null){

            $shop_category->delete();

            session()->flash('success','删除成功');
            return redirect()->route('shop_categorys.index');
        }
        $shop_category->delete();

        session()->flash('warning','该分类下有东西，不能删除');
        return redirect()->route('shop_categorys.index');
    }
}
