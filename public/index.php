<?php

use App\Models\User;

require_once "../app/config/init.php";

$user = new User();
//beautify($user->all());
//beautify($user->find("name","test"));
//beautify($user->findAll("id",1));
//beautify($user->post(2));
//$user->delete("id",10);
//$user->update(["title"=>"Update Title3","content"=>"HaHa"],"id",9);

echo \App\Classes\CSRFToken::_token();
