<?php
/**
 * Created by PhpStorm.
 * User: kaur-joonas
 * Date: 5.12.18
 * Time: 12:57
 */

namespace App\Services;

use App\UserTeamModerator;
use App\UserTeam;

class ModeratorService
{
    /**
     *
     *  check if user is team moderator
     *
     * @param int Team ID
     * @param int User ID
     * @return boolean
     *
     */

    function isModerator($teamId, $userId)
    {
        $moderatedTeams = UserTeamModerator::where('user_id', $userId)->get(['team_id'])->toArray();
        for ($i = 0; $i < count($moderatedTeams); $i++) {
            if (in_array($teamId, $moderatedTeams[$i])) {
                return TRUE;

            }
        }
        return FALSE;
    }

    function belongsTeam($teamId, $userId)
    {
        $belongsTeam = UserTeam::where('user_id',$userId)->where('team_id',$teamId)->get();
        if($belongsTeam->isEmpty()){
            return FALSE;
        }
        return TRUE;

    }
}