<?php

namespace App\Http\Livewire;

use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LanguageTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Language';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.language.iso_code'), 'iso_code')
                ->sortable()->searchable(),
            Column::make(__('messages.language.front_language'), 'front_language_status')
                ->sortable()->searchable(),
            Column::make(__('messages.language.translation')),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('custom-width-action'),
        ];
    }

    public function query(): Builder
    {
        return Language::query()->select('languages.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.language_table';
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns'       => $this->columns(),
                'rowView'       => $this->rowView(),
                'filtersView'   => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows'          => $this->rows,
                'modalsView'    => $this->modalsView(),
                'bulkActions'   => $this->bulkActions,
                'componentName' => 'languages.add-button',
            ]);
    }
    
    public function updateLanguageStatus($postId)
    {
        $language = Language::findOrFail($postId);
        $language->update([
            'front_language_status' => !$language->front_language_status,
        ]);
        $message = $language->front_language_status ? 'Language added to front successfully' : 'Language removed from front successfully';

        $this->dispatchBrowserEvent('success', $message);
    }

}
