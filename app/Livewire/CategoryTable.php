<?php

namespace App\Livewire;

use App\Models\Category;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
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
                    function ($row) {
                        if (filter_var($row->image, FILTER_VALIDATE_URL)) {
                            return $row->image;
                        } else {
                            return asset('storage/' . $row->image);
                        }
                    }
                )
                ->attributes(fn($row) => [
                    'class' => 'object-cover rounded-lg shadow-md w-20 h-20',
                ]),
            ButtonGroupColumn::make('Action')
                ->attributes(fn($row) => [
                    'class' => 'space-x-2'
                ])
                ->buttons([
                    LinkColumn::make('Show')
                        ->title(fn($row) => __('Show'))
                        ->location(fn($row) => route('category.index', $row))
                        ->attributes(fn($row) => [
                            'class' => 'bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-2 rounded',
                        ]),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => __('Edit'))
                        ->location(fn($row) => route('category.edit', $row))
                        ->attributes(fn($row) => [
                            'class' => 'bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded',
                        ]),
                    LinkColumn::make('Delete')
                        ->title(fn($row) => __('Delete'))
                        ->location(fn($row) => route('category.index', $row))
                        ->attributes(fn($row) => [
                            'class' => 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded',
                        ]),
                        
                ])
                
        ];
    }
}
