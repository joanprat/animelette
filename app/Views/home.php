<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animelette</title>
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
        <div class="container text-cemter">
            <a class="navbar-brand" href="<?= $fullPath ?>">ANIMELETTE</a>
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


    <footer class='container-fluid'>
        <div class="row mt-4">
            <div class="container col ms-5">
                <h2><strong>ANIMELETTE</strong></h2>
                <ul class='primerUl'>
                    <li><a href='#'>Explore</a></li>
                    <li><a href='#'>Social</a></li>
                    <li><a href='#'>Forum</a></li>
                </ul>
            </div>

            <div class="container col">
                <ul class='segundoUl'>
                    <li><a href='#'>About</a></li>
                    <li><a href='#'>Contact</a></li>
                    <li><a href='#'>Github</a></li>
                    <li><a href='#'>Donate</a></li>
                </ul>                     
            </div>
        </div>
        <div class='container text-center mt-4'>
            <label class='text-center me-5' >Animelette © 2022</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter me-3" viewBox="0 0 16 16"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook me-3" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>                                           
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-youtube me-3" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/></svg>
        </div>
    </footer>


</body>
</html>