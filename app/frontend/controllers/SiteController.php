<?php

namespace app\frontend\controllers;

use app\frontend\models\User;
use system\components\App;
use system\components\Controller;

class SiteController extends Controller {

    /**
     * 'site/index' action handler
     */
    public function actionIndex() {
//
        // create new User model
        if ($_SESSION['user_id']) {

            $id_user = $_SESSION['user_id'];

            $user_account = User::findOne(['uid' => $id_user]);

//            echo $user_account->{'user_name'} . "<br>";
//
//            print_r($user_account);
//
//            var_dump($user_account);
//            die();


            return $this->render('index', [
                'user_account' => $user_account
            ]);
        }

        $user = new User();

//         try to load by HTML form
        if ($user->load(App::$current->request->post())) {
            // processing of loaded User model
        }

//         render Twig template or JSON (with AJAX checking by Controller)
        $this->render('index', [
            'model' => $user,
        ]);
    }

}