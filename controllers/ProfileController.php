<?php


class ProfileController extends Controller
{
    function index(){

        return $this->view('users.profile');
    }
}