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
    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- Box icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php $fullPath = base_url('Home') ?>
<body class="login-body">
    <nav class="navbar navbar-expand-lg">
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
    <section class="contianer-fluid">
        <article class="container-fluid p-0 details-head-img">
            <img class="img-fluid" src="<?= base_url('assets/img').'/'.$reviewData['banner'] ?>" alt="">
        </article>
        <article class="custom-container text-center white-container review-content p-5 details m-auto">
            <div class="d-flex flex-row">
                <div class="col-10">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row align-items-center">
                            <a class="anime-title me-2" href="<?= $fullPath.'/anime'.'/'.$reviewData['idAnime'] ?>"><?= $reviewData['nameJap'] ?> review</a>
                            <p class="m-0 engagement" id="reviewEngagement<?= $reviewData['idReview'] ?>"><span class='bx bxs-hot'></span><?= $reviewData['likes'] ?></p>
                        </div>
                        <div class="d-flex flex-row align-items-start">
                            <p class="publication-date me-1"><?= ' '.$reviewData['date'] ?></p>                
                            <a href="<?= $fullPath."/profile".'/'.$reviewData['idUser'] ?>" class="user-info">by <?= $reviewData['username'] ?></a>
                            <p class="visually-hidden" id="total-engagement"><?= $reviewData['engagement'] ?></p>
                        </div>                    
                    </div>
                </div>
                <div class="col-2">
                    <div class="d-flex flex-column align-items-center">
                        <button id="btn-fire-1" class="fire p-2 <?php $flag = false; for ($i = 0; $i < sizeof($currentUserLikes); $i++) { if($currentUserLikes[$i]['refReview'] == $reviewData['idReview']) { $flag = true; }  } echo $res = $flag ? 'fire-button-enabled' : 'fire-button-disabled '; ?>" onclick="likeReviewDetails(this, <?= $reviewData['idReview'] ?>, <?= $reviewData['idUser'] ?>, <?= isset($sessionData->userId) ? $sessionData->userId : null  ?>)"><span class='bx bxs-hot'></span></button>
                    </div>                    
                </div>
            </div>
            <p class="review-text text-start my-4"><?= $reviewData['content'] ?></p>
            <button id="btn-fire-2" class="p-2 mt-4 btn-long <?php $flag = false; for ($i = 0; $i < sizeof($currentUserLikes); $i++) { if($currentUserLikes[$i]['refReview'] == $reviewData['idReview']) { $flag = true; }  } echo $res = $flag ? 'fire-button-enabled' : 'fire-button-disabled '; ?>" onclick="likeReviewDetails(this, <?= $reviewData['idReview'] ?>, <?= $reviewData['idUser'] ?>, <?= isset($sessionData->userId) ? $sessionData->userId : null  ?>)"><span class='bx bxs-hot'></span>This is fire</button>
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