<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animelette</title>
    <link rel="icon" href="<?= base_url('assets/pictures/logo_small.png')?>">
    <!-- Custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom-styles.css') ?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php $fullPath = base_url('Home') ?>

<body class="login-body">
    <nav class="navbar navbar-expand-lg nav-background-opacity">
        <div class="container text-cemter">
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
                                <a class="nav-link me-2" aria-current="page" href="<?= $fullPath . "/explore" ?>">Explore</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" aria-current="page" href="<?= $fullPath . "/reviews" ?>">Reviews</a>
                            </li>
                            <li class="nav-item dropdown align-self-center d-none d-lg-block">
                                <?php if (isset($sessionData)) { ?>
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $sessionData->username ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a id="profile-option" class="dropdown-item" href="<?= $fullPath . "/profile" . "/" . $sessionData->userId ?>">Profile</a></li>
                                        <li><a id="profile-option" class="dropdown-item" href="<?= $fullPath . "/logout" ?>">Logout</a></li>
                                    </ul>
                                <?php } else { ?>
                                    <button class="btn-purple px-4"><a href="<?= $fullPath . "/login" ?>">LOG IN</a></button>
                                <?php } ?>
                            </li>
                            <?php if (isset($sessionData)) { ?>
                                <li class="nav-item d-lg-none d-xl-none">
                                    <a class="nav-link me-4" aria-current="page" href="<?= $fullPath . "/profile" . "/" . $sessionData->userId ?>"><?= $sessionData->username ?>'s profile</a>
                                </li>
                                <li class="nav-item d-lg-none d-xl-none">
                                    <a class="nav-link me-4" aria-current="page" href="<?= $fullPath . "/logout" ?>">Logout</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item d-lg-none d-xl-none">
                                    <a class="nav-link me-4" aria-current="page" href="<?= $fullPath . "/login" ?>">Login</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- ********** FIN NAV ********** -->
    <section class="container-fluid text-left m-0 p-0">
        <div class="container-fluid banner px-0">
            <img class="image-fluid" src="http://localhost/animelette/public/assets/img/kaguya-sama_banner.jpg" alt="Banner of the anime">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <article class="container-fluid px-0 anime-head">
                        <div class="container anipic">
                            <img class="image-fluid" src="http://localhost/animelette/public/assets/img/kaguya-sama_img.jpg" alt="Picture of the anime">
                        </div>
                        <div class="d-flex flex-row">
                            <div class="col-12">
                                <div class="container white-container mb-4 py-4">
                                    <p>English</p>
                                    <p class="val">Kaguya-sama: Love Is War</p>
                                    <p>Romaji</p>
                                    <p class="val">Kaguya-sama wa Kokurasetai: Tensai-tachi no Ren'ai Zunōsen</p>
                                    <p>Airing start</p>
                                    <p class="val">2022-04-02</p>
                                    <p>Airing finish</p>
                                    <p class="val">2022-03-27</p>
                                    <p>Season</p>
                                    <p class="val">Spring 2022</p>
                                    <p>Studio</p>
                                    <p class="val">Ufotable</p>
                                    <p>Format</p>
                                    <p class="val">TV</p>
                                    <p>Episodes</p>
                                    <p class="val">26</p>
                                    <p>Episode duration</p>
                                    <p class="val">24 mins</p>
                                    <p>Source</p>
                                    <p class="val">Manga</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-8">
                    <div class="container text-start">
                        <h1>Kaguya-sama wa Kokurasetai: Tensai-tachi no Ren'ai Zunōsen</h1>
                        <p>Score 8.54 <span class="bi bi-star-fill estrella"></span></p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel itaque, qui ex consectetur ea nam ad odit nisi magni. Recusandae commodi adipisci dolores delectus alias eius dolor sint provident minus molestiae! Ratione obcaecati repudiandae sapiente esse atque voluptatibus dolores assumenda!
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt quibusdam voluptatum veritatis et veniam atque eaque nisi eum nam, ab minus facilis dolorem quam tempora?</p>


                        <button type="button" class="btn-add"><b>ADD TO MY LIST <span class="bi bi-plus-lg"></span></b></button>
                        <p></p>
                        <button type="button" class="btn-fav"><b>DELETE <span class="bi bi-trash3-fill"></span> </b></button>
                    </div>
                    <div class="container">
                        <hr>
                    </div>
                    <div class="container">
                        <p>Characters</p>
                        <div class="col-6 my-4">
                            <div class="d-flex flex-row align-items-center rectangle">
                                <div class="col-2">
                                    <img class="img-fluid" src="http://localhost/animelette/public/assets/img/levi.png">
                                </div>
                                <div class="col-8 text-center">
                                    <p>Hidenori Tabata</p>
                                    <p>as</p>
                                    <p>Tomokazu Sugita</p>
                                </div>
                                <div class="col-2">
                                    <img class="img-fluid" src="http://localhost/animelette/public/assets/img/tomokazusugita.png">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 my-4">
                            <div class="d-flex flex-row align-items-center rectangle">
                                <div class="col-2">
                                    <img class="img-fluid" src="http://localhost/animelette/public/assets/img/levi.png">
                                </div>
                                <div class="col-8 text-center">
                                    <p>Hidenori Tabata</p>
                                    <p>as</p>
                                    <p>Tomokazu Sugita</p>
                                </div>
                                <div class="col-2">
                                    <img class="img-fluid" src="http://localhost/animelette/public/assets/img/hiroshikamiya.png">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 my-4">
                            <div class="d-flex flex-row align-items-center rectangle">
                                <div class="col-2">
                                    <img class="img-fluid" src="http://localhost/animelette/public/assets/img/daki.jpg">
                                </div>
                                <div class="col-8 text-center">
                                    <p>Hidenori Tabata</p>
                                    <p>as</p>
                                    <p>Tomokazu Sugita</p>
                                </div>
                                <div class="col-2">
                                    <img class="img-fluid" src="http://localhost/animelette/public/assets/img/miyukisawashiro.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <hr>
                        <p>Reviews</p>
                        <div class="row">
                            <div class="col-2 d-none d-sm-block d-md-block pfp-mini">
                                <img src="http://localhost/animelette/public/assets/pictures/hikarip_pfp.png">
                            </div>
                            <div class="col-10">
                                <textarea class="form-control textarea-rev" placeholder="What do you think about this anime? Explain yourself!" onfocus="this.rows=10"></textarea>
                            </div>
                            <p></p>
                            <button type="button" class="btn-submit"><b>PUBLISH</b></button>
                        </div>
                        <div class=" col-2 d-none d-sm-block d-md-block pfp-mini">
                            <img src="http://localhost/animelette/public/assets/pictures/hikarip_pfp.png">
                        </div>
                    </div>

                    <div class="container">
                        <hr>
                        <p>Status per user</p>
                    </div>
                </div>
            </div>
        </div>
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
                    <h2><strong>HELP US TO BUID ANIMELETTE</strong></h2>
                    <p>If you like our work think about giving a donation!</p>
                    <a href=""><i class='bx bx-coffee-togo' ></i></a>
                    <a href=""><i class='bx bxl-patreon' ></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>