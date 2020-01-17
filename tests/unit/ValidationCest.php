<?php 

use App\Services\ValidationService;
use App\Exceptions\ValidationException;

class ValidationCest
{
    private $service;

    public function _before(UnitTester $I)
    {
        $this->service = new ValidationService();
    }

    public function tryToTestIncorrectUserNameValidation(UnitTester $I)
    {
        $name = 'Anna 1st';

        $actual = $this->service->validateUserName($name);

        $I->assertFalse($actual);
    }

    public function tryToTestCorrectUserNameValidation(UnitTester $I)
    {
        $name = 'Anna';

        $actual = $this->service->validateUserName($name);

        $I->assertTrue($actual);
    }

    public function tryToTestUserSuccessfulValidation(UnitTester $I)
    {
        $name = 'Paul';
        $email = 'paul@gmail.com';

        $actual = $this->service->validateUser($name, $email);

        $I->assertTrue($actual);
    }

    public function tryToTestUserFailedValidation(UnitTester $I)
    {
        $I->expectThrowable(ValidationException::class, function () {
            $name = 'Paul';
            $email = 'paul@gmail';

            $this->service->validateUser($name, $email);
        });
    }

    /**
     * @dataProvider emailDataProvider
     */
    public function tryToTestUserEmailValidation(UnitTester $I, \Codeception\Example $example)
    {
        $actual = $this->service->validateEmail($example['email']);
        $expected = $example['expectedResult'];

        $I->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    protected function emailDataProvider(): array
    {
        return [
            ['email' => 'alex@gmail.com', 'expectedResult' => true],
            ['email' => 'ann@ukr.net', 'expectedResult' => true],
            ['email' => 'user:iam@mail.com', 'expectedResult' => false],
            ['email' => 'user@mail', 'expectedResult' => false],
        ];
    }
}
