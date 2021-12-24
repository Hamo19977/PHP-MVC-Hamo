<?php

trait MiddlewareTrait
{

    static public function admin()
    {
        if ($_SESSION['user']['is_admin']) {
            return true;
        }

        Route::goToUser();
    }

}
