<?php


class UserController extends Controller
{
    function index(){

        return $this->view('users.login');
    }

    function login(){


        $user = new User();

        if($_POST['ajax'] == true || isset($_POST['login'])){

            $email    = $this->email_or_phone('email_or_phone');
            $password = $this->password('password');



            if(!empty($email)){

                if(!empty($password)){

                    $user = $user->find(['email', '=', $email]);

                    if(count($user) == 1){

                        if($password === $user->password){

                            Session::set('email', $user->email);
                            Session::set('name', $user->name);
                            Session::set('password', $this->post('password'));
                            Session::set('remember', $this->remember('remember'));

                            if($_POST['ajax'] === 'true'){

                                $this->flash['success'] = true;

                            }else
                                header('Location:/profile');


                        }else{
                            $this->flash['password'] = "Password incorrect";
                            $this->flash['message'] = "<div class='alert alert-danger'>Password incorrect</div>";
                        }

                    }else{
                        $this->flash['email'] = "E-mail incorrect";
                        $this->flash['message'] = "<div class='alert alert-danger'>E-mail incorrect</div>";
                    }

                }else

                    $this->flash['password'] = "Entrer votre  mot de passe";

            }else{

                $this->flash['email'] = "Entrer votre e-mail";
            }


            if ($_POST['ajax'] == true){

                echo json_encode($this->flash);
                die();

            }else
                return $this->view('users.login');

        }


        if(Cookie::check('email') && Cookie::check('password')){

            $email    = Cookie::get('email');
            $password = Cookie::get('password');
            $remember = Cookie::get('remember');
        }
        return $this->view('users.login',[
            'email'    => $email,
            'password' => $password,
            'remember' => $remember,
        ]);
    }


    function register(){

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])){

            $name       = $this->text('name');
            $day        = $this->select_day('day');
            $month      = $this->select_month('month');
            $year       = $this->select_year('year');
            $location   = $this->emplacement('location');
            $kind      = $this->radio('sexy');
            $email      = $this->email_or_phone('email_or_phone');
            $password   = $this->password('password');
            $created_at = time();



            if($this->success() == true){

                $user = new User();

                $row = $user->find(['email', '=', $email]);

                if(count($row) === 1){
                    $this->flash['message'] = "<div class='alert alert-danger'>This email or number already exists</div>";
                }else{
                    $result = $user->insert(['name' => $name, 'day' => $day, 'month' => $month,
                        'year' => $year, 'email' => $email,'location' => $location, 'kind' => $kind,
                         'password' => $password, 'created_at' => $created_at
                    ]);

                    //dump($result);
                    if($result == true)
                        $this->flash['message'] = "<div class='alert alert-success text-center'>Your registration is well done</div>";
                    else
                        $this->flash['message'] = "<div class='alert alert-danger text-center'>Try again later </div>";
                }

            }
        }

        return $this->view('users.register');
    }


    function password_forget(){


    }






}