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

        $this->validate($request, Physique::$rules, Physique::$messages);
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
