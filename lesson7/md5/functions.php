<?php

function confirmPassword($hash, $salt, $password)
{
    return hashPassword($salt, $password) == $hash;
}

function hashPassword($salt, $password)
{
    //various methods
    //return md5($salt.$password.$salt);
    //return md5($salt.md5($password).$salt);
    //return md5($salt.sha1($password).$salt);
    return md5($salt . $password);
}

function generateSalt()
{
    return substr(md5(uniqid('some_prefix', true)), 1, 10);
}