<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Treasury');

        $this->visitRoute('periods')->see('Add New Period');

        $this->visitRoute('charts', ['period' => 34])->see('crown');

        $this->visitRoute('periods.periodId', ['period'=> 34])->see('colorByPoint');

        $values = ['Title', 'Balance'];
        foreach ($values as $value) {
            $this->visitRoute('accounts.accountId', ['period'=> 34, 'account' => 5])->see($value);
        }
    }
}
