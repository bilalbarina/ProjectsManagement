<?php

function generateToken()
{
    return md5(time());
}