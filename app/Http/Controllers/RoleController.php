<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $roles = Role::with([])->get();
        return response()->json($roles);
    }

        /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $role = Role::find($id);

        if ($role) {
            return response()->json($role, 200);
        }
        return response()->json(["result"=> null,"message"=> "No result"], 404);
    }





}
