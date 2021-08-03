<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Physique;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function insPhysique(Request $request) {
        $data = [];
        $userId = $request->user_id;
        // $user = Physique::where('user_id', $userId)->first();

        // if($user) {
        //     $user_physique = Physique::where('user_id', $userId)->first();

        //     $user_physique->age = $request->age;
        //     $user_physique->gender = $request->gender;
        //     $user_physique->height = $request->height;
        //     $user_physique->weight = $request->weight;

        //     $user_physique->save();
        // }else {
        //     $user_physique = new Physique;
        //     $user_physique->user_id = $userId;
        //     $user_physique->age = $request->age;
        //     $user_physique->gender = $request->gender;
        //     $user_physique->height = $request->height;
        //     $user_physique->weight = $request->weight;

        //     $user_physique->save();
        // }

        $user_physique = Physique::updateOrCreate(
            ['user_id' => $userId],
            ['age' => $request->age, 'gender' => $request->gender, 'height' => $request->height, 'weight' => $request->weight]
        );

        $data[] = $request->age;
        $data[] = $request->gender;
        $data[] = $request->height;
        $data[] = $request->weight;
        $data[] = '成功';

        return $data;
    }

    public function getPhysique(Request $request)
    {
        $userId = $request->user_id;
        $user_physique = Physique::where('user_id', $userId)->first();

        if($user_physique) {
            return $user_physique;
        }
    }
}
