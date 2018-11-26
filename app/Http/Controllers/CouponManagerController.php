<?php

/*
 * ________                          _____________
 * ___  __/_____ ______________ _______  /___  __ )_____ _____  __
 * __  /  _  __ `/_  ___/_  __ `/  _ \  __/_  __  |  __ `/_  / / /
 * _  /   / /_/ /_  /   _  /_/ //  __/ /_ _  /_/ // /_/ /_  /_/ /
 * /_/    \__,_/ /_/    _\__, / \___/\__/ /_____/ \__,_/ _\__, /
 *                      /____/                           /____/
 *
 * This file is part of TargetBay.com: 2016 - 18.
 *
 * @copyright - Pon Pandian <pon@targetbay.com>, Sathish Kumar <sathish@targetbay.com>
 * @author palPalani <palani.p@gmail.com>
 * @version 2.3.0
 */

namespace App\Http\Controllers;
use App\models\user;
use Illuminate\Http\Request;





class CouponManagerController extends Controller
{

    public function __construct()
    {
       
    }

    /**
     * List all coupons.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $data = [];
        $users = user::first();
        $data['first_name'] = $users->fname;
        $data['last_name'] = $users->lname;
        $data['email'] = $users->email;

        return json_encode($data);
    }

    public function create(Request $request)
    {

       $newUser = new user;
       $newUser->fname = 'subbu1';
       $newUser->lname = '1234';
       $newUser->email = 'subramanian.k@innoppl.com';
       $newUser->password = md5('admin@123');

       $newUser->save();


    }
    
}
