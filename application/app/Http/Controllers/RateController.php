<?php namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class RateController extends Controller {

    public function rate($entity, $id)
    {
        if (Input::get('rate') != '')
        {
            $rentity = 'r'.$entity;
            $model = ucfirst($entity);

            // get cookie
            $voted = array();
            $cookie = Cookie::get($rentity);
            if ($cookie) {
                $voted = explode('|', $cookie);
                if (in_array($id, $voted))
                {
                    $rt = new \stdClass;
                    $rt->valid = 0;
                    echo json_encode($rt);
                    exit;
                }
            }
            $voted[] = $id;
            $voted = array_unique($voted);
            $rate = Input::get('rate');

            //rate and get average
            $result = Post::rate((int)$id, (int)$rate);

            //return result to js
            $rt = new \stdClass;
            if ($result)
            {
                $rt->rating = $result->rating;
                $rt->rating_count = $result->rating_count;
                $rt->valid = 1;
            } else {
                $rt->valid = 0;
            }

            //set in cookie the ids of voded post 
            $cookie = Cookie::make($rentity, implode('|', $voted), 60);
            return Response::json($rt)->withCookie($cookie);

        }
    }
}