<?php


class UserController extends Controller
{
    /**
     * @return bool
     */
    function index(){

        return $this->view('users.login');
    }

    /**
     * @return bool
     */
    function login(){

        //dd(Cookie::get('password'));

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


    /**
     * @return bool
     */
    function register(){

        if(($_POST['ajax'] === 'true') || ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register']))){

            $name       = $this->text('name');
            $day        = $this->select_day('day');
            $month      = $this->select_month('month');
            $year       = $this->select_year('year');
            $location   = $this->emplacement('location');
            $kind       = $this->radio('sexy');
            $email      = $this->email_or_phone('email_or_phone');
            $password   = $this->password('password');
            $checkdate  = $this->check_date($month, $day, $year);
            $created_at = time();

            //dd($this->success());

            if($this->success() == true){

                $user = new User();

                $row = $user->find(['email', '=', $email]);

                if(count($row) === 1){
                    $this->flash['message'] = "<div class='alert alert-danger'>This email or number already exists</div>";
                    $this->flash['error'] = true;
                }else{
                    $result = $user->insert(['name' => $name, 'day' => $day, 'month' => $month,
                        'year' => $year, 'email' => $email,'location' => $location, 'kind' => $kind,
                         'password' => $password, 'created_at' => $created_at
                    ]);

                    //dump($result);
                    if($result)
                        $this->flash['message'] = "<div class='alert alert-success text-center'>Your registration is well done</div>";
                    else
                        $this->flash['message'] = "<div class='alert alert-danger text-center'>Try again later </div>";
                        $this->flash['error'] = true;
                }

                if ($_POST['ajax'] === 'true'){

                    echo json_encode($this->flash);
                    die();

                }else
                    return $this->view('users.register');
            }
        }

        return $this->view('users.register');
    }



    function password_forget(){


        if($_POST['ajax'] == true || ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['forget_pass']))){

            $email_phone  = $this->email_or_phone('email_or_phone');

            if($this->success() == true){

                $user = new User();

                $row = $user->find(['email', '=', $email_phone]);


                if(count($row) === 0){
                    $this->flash['message'] = "<div class='alert alert-danger'>This email or number does not correspond to a user</div>";
                    $this->flash['error']     = true;
                }else{

                    $code = $this->alphaNumCode(3);

                    $reset_password = new reset_password();
                    $row = $reset_password->find(['email', '=', $email_phone]);


                    if(count($row) === 0){

                        $insert = $reset_password->insert( ['email' => $email_phone, 'token' => $code]);


                        if($_POST['ajax'] === 'true'){

                            $this->flash['success'] = true;

                        }else
                            header('Location:/user/token?q='.$email_phone);

                    }else{

                        $update = $reset_password->update($email_phone, ['token' => $code]);
                        //dd($update);
                        if($_POST['ajax'] === 'true'){

                            $this->flash['success'] = true;

                        }else
                            header('Location:/user/token?q='.$email_phone);
                    }


                }


                if ($_POST['ajax'] === 'true'){

                    echo json_encode($this->flash);
                    die();

                }else
                    return $this->view('users.password_forget');

            }

        }

        return $this->view('users.password_forget');

    }

    function token(){

        $this->flash['message_send_code'] = "<div class=\"alert alert-success alert-dismissible\">
                                                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                                                  <strong>Success!</strong> We send you the code in your mailbox
                                            </div>";


        if($_POST['ajax'] == true || ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))) {

            $token = $this->post('code');

            if($_POST['ajax'] == true){
                $email = $this->post('q');
            }else{
                $email  = $this->request->q;
            }


            $reset_password  = new reset_password();
            $row = $reset_password->builderGet(['email', '=', $email, 'AND', 'token', '=', $token])
                                  ;
            if(count($row) === 0){

                $this->flash['message'] = "<div class='alert alert-danger'>Your code is incorrect</div>";
                $this->flash['error']   = true;
            }else{

                if($_POST['ajax'] === 'true'){

                    $this->flash['success'] = true;

                }else
                    header("Location:/user/new_password?q={$email}&v={$token}");
            }

            if ($_POST['ajax'] === 'true'){

                echo json_encode($this->flash);
                die();

            }else
                return $this->view('users.code');

        }

        return $this->view('users.code');
    }


    /**
     * @return bool
     */
    function new_password(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){


            $password = $this->password('password');
            $confirm  = $this->password_confirm('password', 'confirm_password');
            $email    = $this->request->q;
            $token    = $this->request->v;



                $reset_password = new reset_password();
                $user           = new User();

                if($this->success() == true){

                    $row = $reset_password->builderGet(['email', '=', $email, 'AND', 'token', '=', $token]);
                    if(count($row) === 1){

                        $update = $user->update($email, ['password' => $password]);
                        header('Location:/user/login');
                    }else
                        $this->flash['message'] = "<div class='alert alert-danger'>Try again later</div>";
                }


        }
        return $this->view('users.new_password');
    }



}