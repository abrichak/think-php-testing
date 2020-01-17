<?php

class HomepageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function homePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Homepage');
    }
}
