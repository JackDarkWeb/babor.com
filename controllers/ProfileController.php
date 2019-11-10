<?php


class ProfileController extends Controller
{
    function index(){

        if(Session::check('email') && Session::check('name')){

           $user = new User();

           $user  = $user->find(['name', '=', Session::get('name')]);


           $user->age = $this->getAge($user);
           $user->birthDay  = $this->getBirthDay($user);


            if(Session::check('remember')){

                Cookie::set('email', Session::get('email'));
                Cookie::set('password', Session::get('password'));
                Cookie::set('remember', Session::get('remember'));
            }


            return $this->view('users.profile',[
                'user' => $user,
            ]);

        }else
            Session::destroy();

    }

    function logout(){
        Session::destroy();
    }
}