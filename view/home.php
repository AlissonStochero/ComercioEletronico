<?php

$smarty = new Smarty;
$smarty->template_dir = 'view/template/';

$texto_welcome = 'Bem vindo ao MVC';
$lorem = 'Lorem ipsum dolor sit amet consectetur.';

$smarty->assign(array(
      'welcome' => $texto_welcome,
      'lorem'    => $lorem

  ));

$smarty->display('home.tpl');
