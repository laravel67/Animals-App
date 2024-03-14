<?php

namespace App\Livewire;

use App\Models\Animal;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Home')]
class Home extends Component
{
    use WithPagination;
    public function render()
    {
        $animals = Animal::orderBy('id', 'desc')->paginate(6);
        return view('livewire.home', [
            'animals' => $animals
        ])->layout('layouts.home');
    }
}
