<?php 

class AddUsersCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToTestAddingUser(AcceptanceTester $I)
    {
        $I->amOnPage('/users');

        $I->fillField('name', 'Lusy');
        $I->fillField('email', 'lusy@gmail.com');
        $I->click('submit');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->see('Lusy');
    }

    public function tryToTestAddingIncorrectUser(AcceptanceTester $I)
    {
        $I->amOnPage('/users');

        $I->fillField('name', 'John');
        $I->fillField('email', 'john&gmail.com');
        $I->click('submit');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNPROCESSABLE_ENTITY); // 200
        $I->dontSee('John');
        $I->see('Invalid email format');
    }
}
