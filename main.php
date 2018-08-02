<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img src="img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle">
                <h2 class="h5" id="userfio">Евгений Гуцалюк</h2><span>Web Developer</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Меню</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="#" id="listReestr"><i class="icon-home"></i> Договора</a></li>
                <li><a href="#" id="js-ocenka-list"><i class="icon-home"></i> Реєстр робіт оцінки</a></li>
                <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Налаштування</a>
                    <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                        <li><a href="#" id="js-user-list">Користувачи</a></li>
                        <li><a href="#" id="js-firma-list">Фірми віконввці</a></li>
                        <li><a href="#" id="js-client-list">Замовники</a></li>
                    </ul>
                </li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> Архів</a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="page">
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="/index.php" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div></a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning" id="allcountocenka">0</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu" id="ocenkainit">
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                            <i class="fa fa-envelope"></i><span class="badge badge-info" id="count-new-message">0</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu" id="new-message-list">
                                <li><a rel="nofollow" href="#" id="js-all-message" class="dropdown-item all-notifications text-center"><strong><i class="fa fa-envelope"></i>Посмотреть все сообщения</strong></a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="/?exit" class="nav-link logout">Выйти<i class="fa fa-sign-out-alt"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb" >
                <li class="breadcrumb-item active" id="nameController"></li>
            </ul>
        </div>
    </div>
    <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <div id="content">


            </div>
            <span id="loader"></span>
        </div>
    </section>
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>Nazaret &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div>
    </footer>
</div>
<?php /* ?>
<div id="wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Меню</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-sitemap"></i> Реєстр
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" id="listReestr">Реєстр замовлень</a>
                        <a class="dropdown-item" href="#">Реєстр робіт оцінки</a>
                    </div>
                </li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-bar-chart-o"></i> Звіти</a>
				</li>
				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bug"></i> Налаштування
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="#" id="listOrg">Підрозділи</a>
                        <a class="dropdown-item" href="#">Користувачі</a>
                        <a class="dropdown-item" href="#">Довідники</a>
                    </div>
				</li>
			</ul>
            <span class="navbar-text">
                <a href="/?exit" class="nav-link logout">Выйти <i class="fa fa-sign-out"></i></a>
            </span>
		</div>
	</nav>
    <div class="card">
        <div class="card-header text-center" id="nameController">
            Featured
        </div>
        <div class="card-body">
            <div id="content">


            </div>
            <span id="loader"></span>
        </div>
        <div class="card-footer text-muted">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 text-left">
                        Евгений Гуцалюк
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        Developer
                    </div>
                    <div class="col-12 col-lg-4 text-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php */ ?>