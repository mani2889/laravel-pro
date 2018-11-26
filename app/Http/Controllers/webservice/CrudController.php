<?php

namespace App\Http\Controllers\webservice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;


class CrudController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        //
    }


    public function create(){ 

        dd("inside");
    }

    public function update(){
        
    }

    public function list(){

        $data = [];
        $users = user::first();
        $data['first_name'] = $users->fname;
        $data['last_name'] = $users->lname;
        $data['email'] = $users->email;

        dd(json_encode($data));
        
    }

    public function delete(){
        
    }

}
