<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/')
        //             ->assertSee('Laravel');
        // });

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/chat')
                  ->waitFor('.chat-composer');

            $second->loginAs(User::find(2))
                   ->visit('/chat')
                   ->waitFor('.chat-composer')
                   ->type('message', 'Hey Taylor')
                   ->press('Send');

            $first->waitForText('Hey Taylor')
                  ->assertSee('Uchi');
        });
    }
}
