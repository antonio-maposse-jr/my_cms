<?php

namespace App\Repositories;

use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class PlanRepository extends BaseRepository
{
    
    public $fieldSearchable = [
        'name',
    ];

    public function getFieldsSearchable(): mixed
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Plan::class;
    }

    public function store($input)
    {
        try {
            DB::beginTransaction();

            $input['trial_days'] = $input['trial_days'] != null ? $input['trial_days'] : 0;
            $input['price'] = removeCommaFromNumbers($input['price']);

            $plan = Plan::create($input);
            
            DB::commit();

            return $plan;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function update($input, $id)
    {
        try {
            DB::beginTransaction();

            $plan = Plan::findOrFail($id);
            $input['trial_days'] = $input['trial_days'] != null ? $input['trial_days'] : 0;
            $input['price'] = removeCommaFromNumbers($input['price']);

            $plan->update($input);

            DB::commit();

            return $input;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

}
