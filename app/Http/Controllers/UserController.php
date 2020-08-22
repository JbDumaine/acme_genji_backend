<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $user = User::with(['role', 'store'])->get();
        return response()->json($user);
    }

        /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $user = User::find($id);
        $user->role;
        $user->store;

        if ($user) {
            return response()->json($user, 200);
        }
        return response()->json(["result"=> null,"message"=> "No result"], 404);
    }





}
