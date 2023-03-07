<?php

namespace App\Repositories;

use App\Models\Analytic;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

/**
 * Class CityRepository
 *
 * @version July 31, 2021, 7:41 am UTC
 */
class DashboardRepository
{
    /**
     * @param $input
     * @return array
     */
    public function updateChartRange($input)
    {
        $startDate = isset($input['start_date']) ? Carbon::parse($input['start_date']) : Carbon::now()->subMonth();
        $endDate = isset($input['end_date']) ? Carbon::parse($input['end_date']) : Carbon::now();
        $result = [];
        $period = CarbonPeriod::create($startDate, $endDate);

        foreach ($period as $date) {
            $result['data'][] = Analytic::whereDate('created_at', $date)->count();
            $result['labels'][] = $date->format('Y-m-d');
        }

        return $result;
    }
}
