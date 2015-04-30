<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 29/04/15
 * Time: 23:54
 */
namespace App;

interface SocialAuthListener
{
    public function userHasLoggedIn($user);
}