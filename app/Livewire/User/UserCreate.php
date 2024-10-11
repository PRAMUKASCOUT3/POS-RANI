<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $name,$email,$password,$isAdmin;
    public $code;

    protected $rules = [
        'name' =>'required|min:3',
        'email' =>'required|email|unique:users',
        'password' => 'required|min:8|',
    ];

    public function mount()
    {
        $this->code = 'US' . str_pad(User::max('id') + 1 , 4 , '0' , STR_PAD_LEFT);
    }

    public function save()
    {
        $validateData = $this->validate();
        $validateData ['isAdmin'] = 0;
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'code' => $this->code,
            'isAdmin' => $validateData['isAdmin']
        ]);


        $this->reset(['name','email','password','code']);
        $this->code = 'US' . str_pad(User::max('id') + 1 , 4 , '0' , STR_PAD_LEFT);
        toastr()->success( 'Data Berhasl Ditambah!');
        return redirect()->route('pengguna.index');
    }
    public function render()
    {
        return view('livewire.user.user-create');
    }
}
