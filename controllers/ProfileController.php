<?php



class ProfileController extends Controller
{
    function index(){


        if(Session::check('email') && Session::check('name')){

           $user = new User();
           $picture = new Picture();

           $user  = $user->find(['name', '=', Session::get('name')]);
           $user->age = $this->getAge($user);
           $user->birthDay  = $this->getBirthDay($user);

            $profile = $picture->find(['user_id', '=', $user->id]);
            $profiles = $picture->get(['user_id', '=', $user->id]);

            //dd($profiles);

            if(Session::check('remember')){

                Cookie::set('email', Session::get('email'));
                Cookie::set('password', Session::get('password'));
                Cookie::set('remember', Session::get('remember'));
            }


            return $this->view('users.profile',[
                'user' => $user,
                'profile' => $profile,
            ]);

        }else
            Session::destroy();

    }



    function upload(){


        if(Session::check('email') && Session::check('name')) {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $file = $this->upload_file('file');

                if($this->success() == true){

                    $picture = new Picture();
                    $created_at = date('Y-m-d H:i:s');
                    $picture->insert(['user_id' => Session::get('id'),'name' => $file, 'profile' => 1, 'created_at' => $created_at]);

                }
            }

            header('Location:/profile');


        }else
            Session::destroy();
    }

    function logout(){

        $online = new Online();
        $created_at = date('Y-m-d H:i:s');
        $online->update(['user_id', Session::get('id')], ['active' => 0, 'created_at' => $created_at]);

        Session::destroy();
    }
}