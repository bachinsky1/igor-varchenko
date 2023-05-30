<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        
        $count = $request->input('count') ?? 6;
        $totalUsers = DB::table('users')->count();
        $totalPages = ceil($totalUsers / $count);
        $page = $request->input('page') ?? 1;

        $offset = ($page - 1) * $count;

        if (!!$request->input('offset')) {
            $offset = $request->input('offset');
        }
        
        $users = User::join('positions', 'users.position_id', '=', 'positions.id')
            ->select('users.*', 'positions.name as position')
            ->skip($offset)
            ->take($count)
            ->orderBy('id', 'asc')
            ->get()->toArray();

        return response()->json([
            'success' => true,
            'total_pages' => $totalPages,
            'total_users' => $totalUsers,
            'count' => $count,
            'page' => $page,
            'links' => [
                'next_url' => '/api/v1/users?page=' . ($page < $totalPages ? $page + 1 : $totalPages) . '&count=' . $count,
                'prev_url' => '/api/v1/users?page=' . ($page > 1 ? $page - 1 : 1) . '&count=' . $count,
            ],
            'users' => $users
        ]);

    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(['name' => $request->input('id')]);
    }

    public function getById(string $id, Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'user' => User::join('positions', 'users.position_id', '=', 'positions.id')
                ->select('users.*', 'positions.name as position')
                ->orderBy('id', 'asc')
                ->get()
                ->find($id)
        ]);
    }

}