<?php

namespace App\Services;

use App\Models\User;

class UsersService
{
    private GroupManagementService $groupService;

    public function __construct(GroupManagementService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function createUser(string $name, string $email): void
    {
        $userName = ucfirst(strtolower($name));

        $group = $this->groupService->getGroup($userName);

        User::create([
            'name'  => $userName,
            'email' => $email,
            'group' => $group,
        ]);
    }
}