<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Category::query()->select('id', 'name', 'is_active', 'image');
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
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('components.button-group')->with([
                        'routeEdit' => route('category.edit', $row),
                        'routeDelete' => route('category.delete', $row),
                    ])
                )->html(),

        ];
    }
}
