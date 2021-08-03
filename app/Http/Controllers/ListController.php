<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class ListController extends Controller
{
    public function getList(Request $request)
    {
        $user_id = $request->user_id;
        $lists = Result::where('user_id', $user_id)->orderBy('first_day', 'desc')->get();

        return $lists;
    }

    public function getListActive(Request $request)
    {
        $user_id = $request->user_id;
        $list = Result::where('user_id', $user_id)->orderBy('first_day', 'desc')->first();
        // アクティブ機能を実装した際に使う
        // $list = Result::where('user_id', $user_id)->where('active_flg', true)->first();

        return $list;
    }

    public function getListDetail(Request $request)
    {
        $user_id = $request->user_id;
        $list = Result::where('user_id', $user_id)->where('id', $request->physique_id)->first();

        return $list;
    }

    public function deleteListDetail(Request $request)
    {
        $user_id = $request->user_id;
        Result::where('user_id', $user_id)->where('id', $request->physique_id)->delete();
        $lists = Result::where('user_id', $user_id)->orderBy('first_day', 'desc')->get();

        return $lists;
    }
}
