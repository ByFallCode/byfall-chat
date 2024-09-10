<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class Utils
{

    const READ = "read";
    const EDIT = "edit";
    const DELETE = "delete";
    const CREATE = "create";

    static function create_time_range($start, $end, $interval = '15 mins', $format) {
        $time_to_Start = strtotime($start);
        $time_to_End   = strtotime($end);
        $time_Format = ($format == '12')?'g:i A':'G:i';

        $current_time   = time();
        $time_adding   = strtotime('+'.$interval, $current_time);
        $difference_time      = $time_adding - $current_time;

        $time_lists = array();
        while ($time_to_Start < $time_to_End) {
            $time_lists[] = date($time_Format, $time_to_Start);
            $time_to_Start += $difference_time;
        }
        $time_lists[] = date($time_Format, $time_to_Start);
        return $time_lists;
    }

    static function days() {
        return array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    }

    static function myHasPermission($permission, $entity): bool
    {
        if(!Auth::check()) {
            redirect("/login");
        }
        $permission = Permission::where('slug', self::slugifyPermission($permission, $entity))->first();
        if($permission != null) {
            $permissions = Auth::user()->permissions;
            foreach ($permissions as $p) {
                if($p->id === $permission->id) {
                    return true;
                }
            }
        }
        abort(401);
    }
    static function slugifyPermission($permission, $entity) {
        return $permission."-".$entity;
    }

}
