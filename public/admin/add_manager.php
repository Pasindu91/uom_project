<?php

require_once '../../core/init.php';


$came_erros = "";

if(Input::exists()){

    $validate = new Validate();
    $validation = $validate->check($_POST,array(

        'manager_uname' => array(
            'required' => true,
            'min' => 2,
            'max' => 45,
            'unique' => 'camss_user'
        ),
        'manager_pass' => array(
            'required' => true,
            'min' => 6
        ),
        'manager_re_pass' => array(
            'required' => true,
            'matches' => 'manager_pass'
        )

    ));




    if($validate->passed()){

        $user = new USER();
        $manager = new Manager();


        try{
            $user_email = Input::get('manager_uname');
            $user_password = MD5(Input::get('manager_pass'));
            $user_type = 3;
            $user_joined_date = date('Y-m-d H:i:s');
            $user_description = Input::get('manager_description');
            $user->register($user_email,$user_password,$user_type,$user_joined_date);
            $manager->register($user_email,$user_description);

            Redirect::to('manager_dashboard.php');

        }
        catch(Exception $ex){
            $came_erros = $ex->getMessage();
            Redirect::to('manager_dashboard.php?error='.$came_erros);
        }

    }
    else{
        foreach ($validate->errors() as $error) {
            $came_erros .=  $error . '<br>';
            Redirect::to('manager_dashboard.php?error='.$came_erros);
        }

    }


}

?>