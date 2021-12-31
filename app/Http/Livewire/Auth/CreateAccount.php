<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateAccount extends Component
{

    public $userid = '';
    public $name = '';
    public $email = '';
    public $password = 'dwktemppassword';
    public $accountMade = 0;

    protected $rules = [
        'userid' => 'required|unique:users,userid',
        'password' => 'required|min:6',
    ];


    public function render()
    {
        return view('livewire.auth.create-account')->layout('layouts.guest', ['title' => 'DWK Create Account']);
    }

    public function createUser() {
        $user = User::create([
            'userid' => $this->userid,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'current_team_id' => 1,
        ]);

        DB::table('team_user')->insert(
            array(
                'team_id' => 1,
                'user_id' => $user->id,
                'role' => 'member',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            )
        );

        $this->accountMade = 1;
    }


    public function resetPage() {
        $this->accountMade = 0;

    }

}




