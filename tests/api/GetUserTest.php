<?php

use Codeception\Util\HttpCode;

class GetUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \ApiTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->tester->haveHttpHeader('accept', 'application/json');
        $this->tester->haveHttpHeader('content-type', 'application/json');
    }

    protected function _after()
    {
    }

    // tests
    public function testGetUser()
    {
        $this->tester->haveInDatabase('users', ['id' => 1, 'name' => 'Alex', 'email' => 'alex@example.com', 'group' => 1]);
        $this->tester->sendGet('/users/1');
        $this->tester->seeResponseCodeIs(HttpCode::OK); // 200
        $this->tester->seeResponseIsJson();
        $this->tester->seeResponseContainsJson([
            'id' => 1,
            'name' => 'Alex',
            'email' => 'alex@example.com',
            'group' => 1,
        ]);
    }
}