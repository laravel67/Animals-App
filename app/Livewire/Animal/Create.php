<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use App\Models\Spesies;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;
    public $name, $spesies_id, $food, $habitat, $description, $image, $oldImage;
    public $animalId;
    public $isEditing = false;
    protected $listeners = [
        'editAnimal' => 'edit',
        'deletedAnimal' => 'deleted'
    ];
    protected function rules()
    {
        $rules = [
            'spesies_id' => 'required',
            'food' => 'string|max:255|required',
            'habitat' => 'required|string|max:255',
            'description' => 'string|nullable',
            'image' => 'nullable|image|file|max:1024',
        ];
        if ($this->isEditing) {
            $rules['name'] = [
                'required',
                'string',
                'max:255',
            ];
        } else {
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('animals', 'name'),
            ];
        }

        return $rules;
    }

    public function render()
    {
        $spesies = Spesies::all();
        return view('livewire.animal.create', compact('spesies'));
    }

    public function store()
    {
        $this->validate();
        $animal = new Animal();
        $animal->name = $this->name;
        $animal->spesies_id = $this->spesies_id;
        $animal->food = $this->food;
        $animal->habitat = $this->habitat;
        $animal->description = $this->description;
        if ($this->image) {
            $imageName = md5($this->name . microtime()) . '.' . $this->image->extension();
            $this->image->storeAs('animals', $imageName, 'public'); // Simpan gambar dengan nama yang diinginkan
            $animal->image = $imageName;
        }
        $animal->save();
        $this->resetField();
        $this->dispatch('storedAnimal');
    }

    public function edit($animal)
    {
        $this->animalId = $animal['id'];
        $this->name = $animal['name'];
        $this->spesies_id = $animal['spesies_id'];
        $this->food = $animal['food'];
        $this->habitat = $animal['habitat'];
        $this->description = $animal['description'];
        $this->oldImage = asset('/storage/animals/' . $animal['image']);
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();
        $animal = Animal::findOrFail($this->animalId);
        $animal->name = $this->name;
        $animal->spesies_id = $this->spesies_id;
        $animal->food = $this->food;
        $animal->habitat = $this->habitat;
        $animal->description = $this->description;
        if ($this->image) {
            $newImageName = md5($this->name . microtime()) . '.' . $this->image->extension();
            $this->image->storeAs('animals', $newImageName, 'public');
            if ($animal->image) {
                Storage::disk('public')->delete('animals/' . $animal->image);
            }
            $animal->image = $newImageName;
        } else {
            $animal->image = $this->oldImage;
        }
        $animal->save();
        $this->resetForm();
        $this->dispatch('updatedAnimal');
    }


    public function resetField()
    {
        $this->name = '';
        $this->spesies_id = '';
        $this->food = '';
        $this->habitat = '';
        $this->description = '';
        $this->image = '';
    }

    public function cancel()
    {
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->resetField();
        $this->isEditing = false;
    }

    public function deleted()
    {
        $this->resetForm();
    }
}
