<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ContactTable extends LivewireTableComponent
{
    public string $tableName = 'Contact';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function columns(): array
    {
        return [

            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.emails.email'), 'email')
                ->sortable()->searchable(),
            Column::make(__('messages.emails.phone'), 'phone')
                ->sortable(),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('text-center'),
        ];
    }

    public function query(): Builder
    {
        return Contact::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.contact_table';
    }
}
