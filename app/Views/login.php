<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animelette</title>
    <link rel="icon" href="<?= base_url('assets/pictures/logo_small.png')?>">
    <!-- Custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom-styles.css')?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
</head>
<?php $fullPath = base_url('Home') ?>
<body class="login-body">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= $fullPath ?>"><img src="<?= base_url('assets/pictures/logo.png')?>" width="200"></a>
            <span class="navbar-toggler bi bi-list" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-6"></div>
                <div class="col-6 ms-4">
                    <div class="container">
                        <ul class="navbar-nav mb-2 mb-lg-0 align-self-end">
                            <li class="nav-item">
                                <a class="nav-link me-2" aria-current="page" href="<?= $fullPath ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" aria-current="page" href="<?= $fullPath."/explore" ?>">Explore</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" aria-current="page" href="<?= $fullPath."/reviews" ?>">Reviews</a>
                            </li>
                            <li class="nav-item dropdown align-self-center d-none d-lg-block">
                                <?php if(isset($sessionData)){?>
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $sessionData->username ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a id="profile-option" class="dropdown-item" href="<?= $fullPath."/profile"."/".$sessionData->userId ?>">Profile</a></li>
                                        <li><a id="profile-option" class="dropdown-item" href="<?= $fullPath."/logout" ?>">Logout</a></li>
                                    </ul>
                                <?php }else{ ?>
                                <button class="btn-purple px-4"><a href="<?= $fullPath."/login" ?>">LOG IN</a></button>
                                <?php } ?>
                            </li>
                            <?php if(isset($sessionData)){?>
                                <li class="nav-item d-lg-none d-xl-none">
                                    <a class="nav-link me-4" aria-current="page" href="<?= $fullPath."/profile"."/".$sessionData->userId ?>"><?= $sessionData->username ?>'s profile</a>
                                </li>
                                <li class="nav-item d-lg-none d-xl-none">
                                    <a class="nav-link me-4" aria-current="page" href="<?= $fullPath."/logout" ?>">Logout</a>
                                </li>  
                            <?php }else{ ?>
                                <li class="nav-item d-lg-none d-xl-none">
                                    <a class="nav-link me-4" aria-current="page" href="<?= $fullPath."/login" ?>">Login</a>
                                </li>  
                            <?php } ?>
                        </ul>                         
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="container-fluid login-section py-4">
        <article class="custom-container px-0">
            <div class="d-flex flex-row">
                <div class="col-6 d-none d-xl-block">
                    <div class="container p-0">
                        <!-- Carousel -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>

                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= base_url('assets/pictures/banner1.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Share your thougths</h5>
                                        <p>Write reviews and share them with the comunity. Rate and give award to other writters.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/pictures/banner2.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Rate your favourite series</h5>
                                        <p>Add your favourite anime to your list and give it an appropiate score</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/pictures/banner3.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Discover your obsessions</h5>
                                        <p>Find about great animes you've never seen before</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/pictures/banner4.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Be an expert</h5>
                                        <p>You can view all the relevant information of each anime including the studio, the production company or the dubbing cast.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/pictures/banner5.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Stay tuned</h5>
                                        <p>Be the first to know when a new chapter is released.</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>                  
                    </div>
                
                <div class="col-xl-6 col-lg-12 align-self-center text-start">
                    <div class="container p-5">
                        <p class="main pb-3">Login</p>
                        <p class="sub pb-3">Welcome back! We have prepared some fresh stuff for you ;)</p>
                        <?= form_open('Home/login') ?>
                            <div class="mb-4">
                                <label for="username" class="form-label visually-hidden">Username</label>
                                <?= form_input(
                                        'username',
                                        '',
                                        $att = ['class' => 'form-control shadow-none p-3','placeholder' => 'Username', 'id' => 'username'],
                                        'text'
                                    ) ;
                                    if (isset($error['username'])) { echo "<p class=\"error-form text-start\">".$error['username']."</p>"; };
                                ?>
                            </div>
                            <div class="mb-4">
                                <label for="passwd" class="form-label visually-hidden">Pssword</label>
                                <?= form_input(
                                        'passwd', 
                                        '',
                                        $att = ['class' => 'form-control shadow-none p-3','placeholder' => 'Password', 'id' => 'passwd'],
                                        'password'
                                    );
                                    if (isset($error['passwd'])) { echo "<p class=\"error-form text-start\">".$error['passwd']."</p>"; };
                                ?>
                            </div>
                            <div class="form-check text-start mb-4">
                                <input class="form-check-input shadow-none" type="checkbox" value="" id="rememberCheckbox">
                                <label class="form-check-label ms-2" for="rememberCheckbox">
                                    Remember me
                                </label>
                            </div>
                            <div class="d-grid gap-2 mb-4">
                                <?= form_input(
                                    'login',
                                    'LOG IN',
                                    $att = ['class' => 'btn btn-purple shadow-none'],
                                    'submit'
                                ) 
                                ?>
                            </div>
                            <!-- <p class="sub">You don't have an account?</p> -->
                            <div class="d-grid gap-2 mb-4">
                                <button type="button" class="btn btn-pink shadow-none"><a href="<?= $fullPath."/register" ?>">REGISTER</a></button>
                            </div>
                            <div class="d-grid gap-2 mb-4">
                                <?php
                                    if(isset($newAccount)){ echo "<button type=\"button\" class=\"btn btn-purple shadow-none\">$newAccount</button>";}
                                ?>
                                </div>
                            <?php if (isset($error['notFound'])) { echo "<p class=\"error-form\">".$error['notFound']."</p>"; };?>
                        <?= form_close() ?>
                    </div>
                </div>                
            </div>
        </article>
    </section>
    <footer class='container-fluid py-5'>
        <div class="container">
            <div class="row text-center">
                <div class="container col text-start">
                    <h2><img src="<?= base_url('assets/pictures/logo.png')?>" width="160"></h2>
                    <ul class='primerUl'>
                        <li><a href='<?= $fullPath ?>'>Home</a></li>
                        <li><a href='<?= $fullPath."/explore" ?>'>Explore</a></li>
                        <li><a href='<?= $fullPath."/reviews" ?>'>Reviews</a></li>
                    </ul>
                </div>
                <div class="conatiner col sns">
                    <h2><strong>ANIMELETTE IN SNS</strong></h2>
                    <p>Follow us in social media</p>
                    <a href=""><i class='bx bxl-facebook-circle'></i></a>
                    <a href=""><i class='bx bxl-twitter' ></i></a>
                    <a href=""><i class='bx bxl-instagram-alt' ></i></a>
                    <a href="https://github.com/joanprat/animelette"><i class='bx bxl-github' ></i></a>
                </div>
                <div class="conatiner col donate">
                    <h2><strong>HELP US TO BUILD ANIMELETTE</strong></h2>
                    <p>If you like our work think about giving a donation!</p>
                    <a href=""><i class='bx bx-coffee-togo' ></i></a>
                    <a href=""><i class='bx bxl-patreon' ></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>