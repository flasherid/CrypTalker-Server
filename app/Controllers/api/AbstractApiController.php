<?php

namespace Controllers\Api;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Controllers\AbstractController;

/**
 * Class AbstractApiController
 * @package Controllers\Api
 */
class AbstractApiController extends AbstractController
{

    public function logged()
    {
        if (Auth::check()) {
            return;
        }

        $data = array(
            'data' => array(),
            'success' => false,
            'errors' => array(
                'messages' => array(
                    'User must be logged in to the app'
                ),
                'errno' => 401
            )
        );

        $this->answerJson($data);
    }


    /**
     * Do a json answer and die.
     *
     * Used only for a specific Model case, and the logged
     * method of this class.
     *
     * @param $data
     */
    public static function answerJson($data)
    {
        echo Response::json($data)->getContent();
        die;
    }
}
