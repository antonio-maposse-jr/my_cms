<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class StaffTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Staff';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.user.full_name'), 'first_name')
                ->sortable()->searchable(),
            Column::make(__('messages.subscription.current_plan'), 'first_name')
                ->sortable()->searchable(),
            Column::make(__('messages.staff.role'), 'roles.name')
                ->searchable(),
            Column::make(__('messages.staff.email_verified'), 'status'),
            Column::make(__('messages.status'), 'status'),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('custom-width-action'),
        ];
    }

    public function updateStatus($status, $id)
    {
        $updateStatus = ($status) ? 0 : 1;
        $staff = User::findOrFail($id);
        $staff->update(['status' => $updateStatus]);
        $this->resetPage();
        $this->dispatchBrowserEvent('success', 'Status updated successfully');
    }

    public function emailVerified($id)
    {
        $staff = User::findOrFail($id);
        $staff->update(['email_verified_at' => Carbon::now()]);
        $this->resetPage();
        $this->dispatchBrowserEvent('success', 'Status updated successfully');
    }

    public function query(): Builder
    {
        return User::with('roles', 'subscription.plan')->where('type', User::STAFF);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.staff_table';
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'staffs.add-button',
            ]);
    }
}
