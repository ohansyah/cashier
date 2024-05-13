<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    #[Validate('required', 'string', 'max:255')]
    public string $name = '';

    #[Validate('required', 'boolean')]
    public bool $is_active = true;

    #[Validate('required', 'image', 'max:1024')]
    public $image = null;

}
