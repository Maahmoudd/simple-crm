<?php

namespace App\Http\Controllers;

use Crm\User\Requests\NoteCreation;
use Crm\User\Services\NoteService;

class UserController extends Controller
{
    private NoteService $userService;
    const TOKEN_NAME = 'personal';

    public function __construct(NoteService $userService)
    {
        $this->userService = $userService;
    }

    public function create(NoteCreation $request)
    {
        $user = $this->userService->create($request);
        return response()->json(
            [
                'user' => $user,
                'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken
            ]

        );
    }
}
