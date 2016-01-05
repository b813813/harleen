<?php

namespace App\Quinzel\Repository;

use App\User;
use App\Play;

class PlayRepository
{
    public function index(User $user)
    {
        $plays = Play::withTrashed()
            ->with('gcf')
            ->where('working_area_id', $user->working_area_id)
            ->orderBy('updated_at', 'created_at')
            ->get();

        return $plays->each(function ($item, $key) {
            $item->name = createPlayName(
                $item->gcf->res_litho,
                $item->gcf->res_formation,
                $item->gcf->res_formation_level,
                $item->gcf->res_age_period,
                $item->gcf->res_age_epoch,
                $item->gcf->res_dep_env,
                $item->gcf->trp_type
            );
        });
    }
}