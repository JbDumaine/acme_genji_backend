<?php

namespace App\Http\Controllers;

use App\Models\Command;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $commands = Command::all();
        return response()->json($commands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $command = new Command($request->json()->all());
        if (!$command->save()) {
            return response()->json("New command not saved!", 500);
        }
        return response()->json($command, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $command = Command::find($id);
        if ($command) {
            return response()->json($command, 200);
        }
        return response()->json(["result"=> null,"message"=> "No result"], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Command $command
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $command = Command::find($id);
        $command->command_number = $request->command_number;
        $command->delivery_date = $request->delivery_date;
        $command->store_id = $request->store_id;
        $command->state_id = $request->state_id;

        if ($command->save()) {
            return response()->json($command, 200);
        }
        return response()->json("Command not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $command = Command::find($id);
        if ($command->delete()) {
            return response()->json(204);
        }
        return response()->json("Command id " . $id . " not removed. An error occurred", 500);
    }
}
