<?php

namespace App\Livewire\Animals;

use App\Models\Animal;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Animals')]
class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $animals = Animal::orderBy('id', 'desc')->paginate(6);
        return view('livewire.animals.index', [
            'animals' => $animals
        ])->layout('layouts.home');
    }
}
