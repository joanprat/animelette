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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
</head>

<?php $fullPath = base_url('Home/') ?>
<body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

 <div class="cursor"></div>      <!-- Para cambiar el estilo del cursor -->
    <script>
            const cursor = document.querySelector('.cursor');
            document.addEventListener('mousemove',(e)=> {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';
            })
    </script>


    <video src="<?= base_url('assets/img/videokimetsu.mp4') ?>" autoplay loop muted plays-inline class="backvideo"> </video>
    <nav class="navbar navbar-expand-lg nav-background-opacity ">
        <div class="container">

        <a class="navbar-brand" href="<?= $fullPath ?>"><img src="<?= base_url('assets/pictures/logo.png')?>" width="200"></a>  <!-- LOGO -------->

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
    
    <div class="ola"> 
    <section class="container-fluid hero">
        <!-- // ! TODO - Branch home -->
        <div class="container-fluid landingText">
            <h1>ANIMELETTE</h1>
            <p>Create your anime list, share what you watch, rate,  discuss, and discover more!</p><br> 
            <a href="<?= $fullPath."/login" ?>"  class="btnLanding">START NOW!</a>
        </div>
    </section>
    <div>


    <!-- FEATURES section -->
    <section class="container-fluid pt-4 features text-center">
    <div class="container px-4 py-5" data-aos="fade-up" data-aos-duration="500">
        <h2 class="pb-2" data-aos="fade-up" data-aos-duration="500">YOUR ANIME ENCYCLOPEDIA</h2>
        <p>Animelette is a tool that allows you to keep track of what you are watching and keep up to date with the world of anime through our vast community.</p>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            <div class="col d-flex align-items-start">
                <div>
                <img src="<?= base_url('assets/img/rocket.png')?>">
                <h4 class="fw-bold mb-2">Discover</h4>
                <p>Create your anime list, share what you watch, rate,  discuss, and discover more!</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <div>
                    <img src="<?= base_url('assets/img/search.png')?>">
                    <h4 class="fw-bold mb-2">Be ready</h4>
                    <p>Stay tuned for upcoming anime releases and be the first to rate them.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <div>
                    <img src="<?= base_url('assets/img/share.png')?>">
                    <h4 class="fw-bold mb-2">Express</h4>
                    <p>Write your reviews, rate, or share ideas with the community</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <div>
                    <img src="<?= base_url('assets/img/list.png')?>">
                    <h4 class="fw-bold mb-2">Make your list</h4>
                    <p>Keep track of anime you've completed, the anime you've left and the episodes you've watched</p>
                </div>
            </div>
  </div>
</section>
<footer class='container-fluid py-4'>
    <div class="container">
        <div class="row text-center">
            <div class="container col text-start">
                <h2><strong>ANIMELETTE</strong></h2>
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