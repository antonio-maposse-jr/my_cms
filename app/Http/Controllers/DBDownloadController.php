<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\DbDumper\Databases\MySql;

class DBDownloadController extends Controller
{
    public function DbDownload()
    {
          MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile('dump.sql');
//        
//        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";
//
//        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/" . $filename;
//
//        $returnVar = NULL;
//        $output  = NULL;
//
//        exec($command, $output, $returnVar);

        return response()->download($filejson);
        
        
    }
}
