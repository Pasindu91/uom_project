<?php

require_once '../../core/init.php';


$came_erros = "";

if(Input::exists()){

    $validate = new Validate();
    $validation = $validate->check($_POST,array(

        'leader_uname' => array(
            'required' => true,
            'min' => 2,
            'max' => 45,
            'unique' => 'camss_user'
        ),
        'leader_pass' => array(
            'required' => true,
            'min' => 6
        ),
        'leader_re_pass' => array(
            'required' => true,
            'matches' => 'leader_pass'
        )

    ));




    if($validate->passed()){

        $user = new USER();
        $leader = new TeamLeader();


        try{
            $user_email = Input::get('leader_uname');
            $user_password = MD5(Input::get('leader_pass'));
            $user_type = 3;
            $user_joined_date = date('Y-m-d H:i:s');
            $user_description = Input::get('leader_description');
            $user->register($user_email,$user_password,$user_type,$user_joined_date);
            $leader->register($user_email,$user_description);

            Redirect::to('leader_dashboard.php');

        }
        catch(Exception $ex){
            $came_erros = $ex->getMessage();
            Redirect::to('leader_dashboard.php?error='.$came_erros);
        }

    }
    else{
        foreach ($validate->errors() as $error) {
            $came_erros .=  $error . '<br>';
            Redirect::to('leader_dashboard.php?error='.$came_erros);
        }

    }


}

?>