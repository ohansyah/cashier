<?php

namespace App\Livewire;

use App\Models\Category;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Category::query()->select('id','name','is_active','image');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Is Active", "is_active")
                ->sortable()
                ->setView('components.boolean'),
            ImageColumn::make("Image", "image")
                ->location(
                    fn($row) => $row->image
                )
                ->attributes(fn($row) => [
                    'class' => 'object-cover rounded-lg shadow-md w-20 h-20',
                ]),
        ];
    }
}
