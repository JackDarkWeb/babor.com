<?php


class DatingController extends  Controller
{
    function  index(){

        $user = new User();
        $users = $user->findAll();

        return $this->view('users.dating',[
            'users' => $users,
        ]);
    }
}