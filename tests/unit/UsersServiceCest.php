<?php

use App\Services\GroupManagementService;
use App\Services\UsersService;
use Codeception\Stub;

class UsersServiceCest
{
    public function _before(UnitTester $I)
    {
    }

    public function tryToTestUserCreation(UnitTester $I)
    {
        $name = 'john';
        $email = 'john@mail.com';

        $groupService = Stub::make(
            GroupManagementService::class,
            ['getGroup' => function($userName) {
                return 1;
            }]
        );

        (new UsersService($groupService))->createUser($name, $email);
        $I->seeInDatabase('users', ['name' => 'John', 'email' => 'john@mail.com']);
    }
}
