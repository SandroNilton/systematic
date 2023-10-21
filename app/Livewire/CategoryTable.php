<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateTimeFilter;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;

class CategoryTable extends DataTableComponent
{
  protected $model = Category::class;

  protected $listeners = ['refresh-table-category' => '$refresh'];

  public function configure(): void
  {
    $this->setPrimaryKey('id');
    $this->setBulkActionsEnabled();
  }

  public function bulkActions(): array
  {
    return [
      'activate' => 'Activar',
      'desactivate' => 'Desactivar',
      'export' => 'Exportar',
    ];
  }

  public function filters(): array
  {
    return [
      DateTimeFilter::make('Creación desde')->filter(function(Builder $builder, string $value) { $builder->where('categories.created_at', '>=', $value); }),
      DateTimeFilter::make('Creación a')->filter(function(Builder $builder, string $value) { $builder->where('categories.created_at', '<=', $value); }),
      SelectFilter::make('Estado')
      ->setFilterPillTitle('Estado')
      ->setFilterPillValues(['activo' => 'Activo', 'inactivo' => 'Inactivo',])
      ->options(['' => 'Todo', 'activo' => 'Activo', 'inactivo' => 'Inactivo',])
      ->filter(function(Builder $builder, string $value) {
        if ($value === 'activo') {
            $builder->where('categories.state', 1);
        } elseif ($value === 'inactivo') {
            $builder->where('categories.state', 0);
        }
      }),
    ];
  }

  public function activate()
  {
    Category::whereIn('id', $this->getSelected())->update(['state' => 1]);
    $this->clearSelected();
  }

  public function deactivate()
  {
    Category::whereIn('id', $this->getSelected())->update(['state' => 0]);
    $this->clearSelected();
  }

  public function columns(): array
  {
    return [
      Column::make("Id", "id")
        ->sortable()
        ->searchable(),
      Column::make("Nombre", "name")
        ->sortable()
        ->searchable(),
      Column::make("Descripción", "description")
        ->sortable()
        ->searchable(),
      Column::make("Descripción", "state")
        ->sortable()
        ->searchable(),
      Column::make("Fecha de creación", "created_at")
        ->sortable()
        ->format(fn($value, $row, Column $column) => ''.$row->created_at->format('d/m/Y H:i').'')->html(),
    ];
  }

  public function builder(): Builder
  {
    return Category::query()->orderBy('created_at', 'desc');
  }
}
