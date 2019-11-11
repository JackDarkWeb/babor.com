<?php


class EncounterController extends  Controller
{
    function index(){


        $user = new User();

        $users = $user->findAll();
        $first = current($users);

        shuffle($users);

        return $this->view('users.encounter',[
            'users' => $users,
            'first' => $first,
        ]);
    }

}