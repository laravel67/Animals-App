<?php

namespace App\Livewire;

use App\Models\Animal;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Dashboard extends Component
{
    use WithPagination;
    public $animalId;
    public $search = '';
    protected $listeners = [
        'storedAnimal' => 'storedHandler',
        'updatedAnimal' => 'updatedHandler',
        'deleteConfirmed' => 'deleteHandler'
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $animals = Animal::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.dashboard', compact('animals'));
    }

    public function storedHandler()
    {
        session()->flash('success', 'The animal has been created.');
    }

    public function updatedHandler()
    {
        session()->flash('success', 'The animal has been updated.');
    }

    public function edit($animalId)
    {
        $this->animalId = Animal::findOrFail($animalId);
        $this->dispatch('editAnimal', $this->animalId);
    }

    public function deleting($id)
    {
        $this->animalId = $id;
        $this->dispatch('show-confirmation');
    }

    public function deleteHandler()
    {
        $animal = Animal::find($this->animalId);
        if ($animal) {
            if ($animal->image) {
                Storage::disk('public')->delete('animals/' . $animal->image);
            }
            $animal->delete();
            session()->flash('success', 'The animal has been deleted.');
            $this->dispatch('deletedAnimal');
        }
    }
}
