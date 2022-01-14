<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

class DashboardService
{
    public function userCount()
    {
        $users = User::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m'); 
        });

        $userMonthCount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $userMonthCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($userMonthCount[$i])){
                $userArr[$i] = $userMonthCount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }

        return $userArr;

    }

    public function postCount()
    {
        $posts = Post::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
        $postMonthCount = [];
        $postArr = [];

        foreach ($posts as $key => $value) {
            $postMonthCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($postMonthCount[$i])){
                $postArr[$i] = $postMonthCount[$i];    
            }else{
                $postArr[$i] = 0;
            }
        }

        return $postArr;
       
    }

}