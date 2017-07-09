<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    Use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        // check if home is working
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/')
        //             ->assertSee('Laravel');
        // });

        //create dummy users 1 and 2
        $user1 = factory(User::class)->create([
                'name' => 'Jane Day'
            ]);
        $user2 = factory(User::class)->create([
                'name' => 'Jana Smith'
            ]);

        //login as user #1 and #2 and send dummy chat
        $this->browse(function ($first, $second) use ($user1, $user2) {
            $first->loginAs($user1)
                  ->visit('/chat')
                  ->waitFor('.chat-composer');

            $second->loginAs($user2)
                   ->visit('/chat')
                   ->waitFor('.chat-composer')
                   ->type('message', 'Hey Jane')
                   ->press('Send');

            $first->waitForText('Hey Jane')
                  ->assertSee('Jana Smith');
        });
    }
}
