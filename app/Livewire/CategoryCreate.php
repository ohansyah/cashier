<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use App\Services\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryCreate extends Component
{
    use WithFileUploads;
    public CategoryForm $form;

    public function save()
    {
        $this->form->validate();

        $category = new Category();
        $category->name = $this->form->name;
        $category->is_active = $this->form->is_active;
        $category->image = $this->form->image->store('categories', 'public');
        $category->save();

        Session::success(__('success_add').' '.__('category'));
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.category-create');
    }
}
