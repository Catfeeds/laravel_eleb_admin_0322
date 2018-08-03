<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $username=$request->username;
        $tel=$request->tel;
        $where=[];
        if($username){
           $where[]=['username','=',$username];
        }
        if($tel){
            $where[]=['tel','=',$tel];
        }
       $members=Member::where($where)->get();
       return view('member/index',compact('members'));
    }

    public function show(Member $member)
    {
        return view('member/show',compact('member'));
    }

    public function stop(Request $request)
    {
        $id=$request->id;
        $member=Member::find($id);

        if($request->status=='end'){
            $member->update(['status'=>1]);
        }
        if($request->status=='ing'){
            $member->update(['status'=>0]);
        }
        return redirect()->route('members.index');
    }
}
