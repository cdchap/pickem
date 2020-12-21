<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use App\Models\Invitation;
use Carbon\Carbon;

class Register extends Component
{
    /** @var string */
    public $username = '';

    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public $invitation_token;

    public function mount(Request $request)
    {
        $this->invitation_token = $request->invitation_token;
        $invitation = Invitation::where('invitation_token', $this->invitation_token)->firstOrFail();
        $this->email = $invitation->email;
    }

    public function register()
    {
        $this->validate([
            'username' => ['required', 'unique:users', 'alpha_dash'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email' => $this->email,
            'username' => $this->username,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        $invitation = Invitation::where('email', $user->email)->firstOrFail();
        $time = Carbon::now();
        $invitation->registered_at = $time;
        $invitation->save();

        $user->assignRole('user');
        $user->givePermissionTo(['can pick 2020', 'edit profile']);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
