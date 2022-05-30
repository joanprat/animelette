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
<body class="reviews-body">
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
    <section class="container text-center mt-4 reviews">
        <article class="container py-4">
            <div class="container text-start">
                <h2>Hot reviews</h2>
            </div>
                <?php foreach ($reviews as $key => $review) { ?>
                    <div class="review-container my-5 <?php for ($i = 0; $i < sizeof($currentUserLikes); $i++) { if($currentUserLikes[$i]['refReview'] == $review['idReview']) { echo 'active-review'; } } ?>" id="reviewContainer<?= $review['idReview'] ?>">
                        <div class="d-flex flex-row">
                            <!-- Userprofile -->
                            <div class="col-3 align-self-center d-none d-md-block">
                                <div class="container review-profile py-4">
                                    <a href="<?= $fullPath."/profile"."/".$review['idUser'] ?>"><img src="<?= base_url('assets/pictures').'/'.$review['profilePic'] ?>" alt="Review <?= $review['idReview'] ?> profile pic"></a>
                                    <p class="mt-3 mb-2"><?= $review['username'] ?></p>
                                    <p class="engagement m-0 p-0 totalEngagement<?= $review["idUser"] ?>"><span class='bx bxs-hot'></span> <?= $review['engagement'] ?></p>
                                </div>
                            </div>
                            <!-- Review -->
                            <div class="col-9 text-start white-container-2">
                                <div class="container review-content px-5 py-2">
                                    <a class="anime-title mt-4 mb-0" href="<?= $fullPath."/anime"."/".$review['idAnime'] ?>"><?= $review['nameJap'] ?></a>
                                    <div class="d-flex flex-row">
                                        <p class="publication-date"><?= $review['date'] ?></p>
                                        <p class="ms-2 engagement me-2" id="reviewEngagement<?= $review["idReview"] ?>"><span class='bx bxs-hot'></span><?= $review['likes'] ?></p>  
                                        <a class="user-mobile d-block d-md-none d-lg-none" href="<?= $fullPath."/profile"."/".$review['idUser'] ?>">By <?= $review['username'] ?></a>
                                    </div>
                                    
                                    <p class="review-text"><?= substr($review['content'], 0, 400) ?>...</p>
                                    <a class="more" href="<?= $fullPath."/details"."/".$review['idReview'] ?>">Show more</a>
                                </div>                            
                            </div>
                        </div>
                        <div class="container-fluid col-12 review-footer p-0 d-none d-md-block">
                            <div class="d-flex flex-row">
                                <div class="col-3">
                                    <div class="container-fluid p-0">
                                        <img class="banner" src="<?= base_url('assets/img').'/'.$review['banner'] ?>" alt="Review <?= $review['idReview'] ?> banner">
                                    </div>
                                </div>
                                <div class="col-9 align-self-center">
                                    <div class="container">
                                        <p class="like m-0 <?php for ($i = 0; $i < sizeof($currentUserLikes); $i++) { if($currentUserLikes[$i]['refReview'] == $review['idReview']) { echo 'engagement'; } } ?>" id="reviewContainer<?= $review['idReview'] ?>" onclick="likeReview(this, <?= $review['idReview'] ?>, <?= $review['idUser'] ?>, <?= isset($sessionData->userId) ? $sessionData->userId : null  ?>)"><span class='bx bxs-hot'></span> This is fire!</p>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <!-- Footer mobile -->
                        <div class="container-fluid col-12 review-footer d-block d-md-none d-lg-none d-xl-none">
                            <div class="container py-2">
                                <p class="like m-0 <?php for ($i = 0; $i < sizeof($currentUserLikes); $i++) { if($currentUserLikes[$i]['refReview'] == $review['idReview']) { echo 'engagement'; } } ?>" id="reviewContainer<?= $review['idReview'] ?>" onclick="likeReview(this, <?= $review['idReview'] ?>, <?= $review['idUser'] ?>, <?= isset($sessionData->userId) ? $sessionData->userId : null  ?>)"><span class='bx bxs-hot'></span> This is fire!</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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