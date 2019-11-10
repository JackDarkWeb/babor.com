<?php


class EncounterController extends  Controller
{
    function index(){


        $user = new User();

        $users = $user->findAll();

        $first = current($users);

        shuffle($users);

        $first->age = $this->getAge($first);
        $first->birthDay  = $this->getBirthDay($first);


        return $this->view('users.encounter',[
            'users' => $users,
            'first' => $first,
        ]);
    }

}