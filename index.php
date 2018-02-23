<?php
include_once 'conf.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/fontastic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="/assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <link rel="stylesheet" href="/assets/css/style.default.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<?php
$r='';

$auth = new auth(); //~ Создаем новый объект класса

//~ Авторизация
if (isset($_POST['send'])) {
	if (!$auth->authorization()) {
		$error = $_SESSION['error'];
		unset ($_SESSION['error']);
	}
}

//~ выход
if (isset($_GET['exit'])) $auth->exit_user();

//~ Проверка авторизации
if ($auth->check()) {
	include_once 'main.php';
}

else {
	//~ если есть ошибки выводим и предлагаем восстановить пароль
	if (isset($error)) $r.=$error.'<a href="recovery.php">Восстановить пароль</a><br/>';
	$r.='
    <div class="page login-page">
        <div class="container">
            <div class="form-outer text-center d-flex align-items-center">
                <div class="form-inner">
                    <div class="logo text-uppercase"><span>Авторизация</span></div>
                    <form id="loginform" class="form-horizontal" role="form" action="" method="post">
    
                        <div class="form-group-material">
                            <input id="login-username" type="text" class="form-control" value="'.@$_POST['login'].'" name="login"  placeholder="Телефон">
                        </div>
    
                        <div class="form-group-material">
                            <input id="login-password" type="password" class="form-control" name="passwd" placeholder="Пароль">
                        </div>
                        
                        <input type="submit"  class="btn btn-success" name="send" value="Увійти">
                    </form>
                </div>
            </div>
        </div>
    </div>
    ';
    }
	print $r;

include_once 'footer.php';
?>

</body>
</html>
