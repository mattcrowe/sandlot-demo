<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $item
     * @param $input
     * @param $key
     */
    public function set($item, $input, $key)
    {
        if (is_array($key)) {
            foreach ($key as $_key) {
                $this->set($item, $input, $_key);
            }
        } elseif (array_key_exists($key, $input)) {
            $item->$key = $input[$key];
        }
    }
}
