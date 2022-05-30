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
    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- Box Icons -->
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
            <img class="image-fluid" src="<?= base_url('assets/img')."/".$animeData[0]["banner"] ?>" alt="Banner of the anime">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <article class="container-fluid px-0 anime-head">
                        <div class="container anipic">
                            <img class="image-fluid" src="<?= base_url('assets/img')."/".$animeData[0]["img"] ?>" alt="Picture of the anime">
                        </div>
                        <div class="d-flex flex-row mb-5">
                            <div class="col-12">
                                <div class="container white-container mb-4 py-4">
                                    <p>English</p>
                                    <p class="val"><?= $animeData[0]["nameEng"] ?></p>
                                    <p>Romaji</p>
                                    <p class="val"><?= $animeData[0]["nameJap"] ?></p>
                                    <p>Airing start</p>
                                    <p class="val"><?= $animeData[0]["airingStart"] ?></p>
                                    <p>Airing finish</p>
                                    <p class="val"><?= $animeData[0]["airingFinish"] ?></p>
                                    <p>Season</p>
                                    <p class="val"><?= $animeData[0]["season"]." ".$animeData[0]["yearBroadcast"] ?></p>
                                    <p>Studio</p>
                                    <p class="val"><?= $animeData[0]["studio"] ?></p>
                                    <p>Format</p>
                                    <p class="val"><?= $animeData[0]["type"] ?></p>
                                    <p>Episodes</p>
                                    <p class="val"><?= $animeData[0]["totalEpisodes"] ?></p>
                                    <p>Episode duration</p>
                                    <p class="val"><?= $animeData[0]["duration"]." min" ?></p>
                                    <p>Source</p>
                                    <p class="val"><?= $animeData[0]["source"] ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-8">
                    <div class="container text-start anime-info my-4">
                        <p class="title mb-0"><?= $animeData[0]["nameJap"] ?></p>
                        <p class="score"><?= "Score ".$medianScore["score"] ?> <span class="bi bi-star-fill estrella"></span></p>
                        <p><?= $animeData[0]["synopsis"] ?></p>
                        <?php if (isset($sessionData)) { ?>
                        <div class="d-flex flex-row align-items-center text-center" id="user-anime-status">
                            <?php if(sizeof($isInList) > 0) { ?>
                                <button type="button" class="btn-fav" onclick="removeAnimeFromList(<?= $sessionData->userId ?>, <?= $animeData[0]['idAnime'] ?>)"><b>Remove from list <span class="bi bi-trash3-fill"></span> </b></button>
                            <?php }else { ?>
                            <div class="col-3">
                                <button type="button" class="btn-add p-3 me-2" onclick="addAnimeToList(this, <?= $sessionData->userId ?>, <?= $animeData[0]['idAnime'] ?>, <?= $animeData[0]['totalEpisodes'] ?>)"><b>Add to my list <span class='bx bx-plus-medical'></span></b></button>
                            </div>
                            <div class="col-3 me-2">
                                <label for="episodes" class="form-label visually-hidden">Number of empisodes seen</label>
                                <input class="form-control p-3 add-anime" type="number" min="0" max="<?= $animeData[0]['totalEpisodes'] ?>" class="form-control" id="episodes" placeholder="Episodes / <?= $animeData[0]['totalEpisodes'] ?>">
                            </div>
                            <div class="col-3 me-2">
                                <label for="score" class="form-label visually-hidden">Score</label>
                                <input class="form-control p-3 add-anime" type="number" min="0" max="10" class="form-control" id="score" placeholder="Score / 10">
                            </div>
                            <div class="col-3">
                                <select class="form-select p-3 add-anime" aria-label="Default select example">
                                    <option value="" selected disabled>Status</option>
                                    <option value="watching">Watching</option>
                                    <option value="completed">Completed</option>
                                    <option value="on hold">On hold</option>
                                    <option value="dropped">Dropped</option>
                                    <option value="planning">Planning</option>
                                </select>
                            </div>
                           <?php } ?> 
                        </div>
                        <?php } ?>
                    </div>
                    <div class="container">
                        <hr>
                    </div>
                    <div class="container">
                        <p class="section-title my-4">Cast</p>
                        <?php 
                        foreach ($char_va as $key => $row) {
                        ?>
                            <div class="d-flex flex-row align-items-center my-4 char-va">
                                <div class="col-2">
                                    <img class="img-fluid" src="<?= base_url('assets/img').'/'.$row['charimg'] ?>">
                                </div>
                                <div class="col-8 text-center">
                                    <p class="name-char"><?= $row['surnameCharacter']." ".$row['nameCharacter'] ?></p>
                                    <p>as</p>
                                    <p class="name-va"><?= $row['surnameVa']." ".$row['nameVa'] ?></p>
                                </div>
                                <div class="col-2">
                                    <img class="img-fluid" src="<?= base_url('assets/img').'/'.$row['vaimg'] ?>">
                                </div>
                            </div>
                        <?php
                        } 
                        ?>
                    </div>
                    <div class="container">
                        <hr>
                    </div>
                    <div class="container review-anime">
                        <p class="section-title my-4">Reviews</p>
                        <?php if (isset($sessionData)) { ?>
                        <div class="container p-4 white-container" id="review-publish">
                            <div class="d-flex flex-row mb-4 align-items-stretch p-4">
                                <div class="col-2">
                                    <img class="img-fluid" src="<?= base_url('assets/pictures')."/".$sessionData->pfp ?>">
                                </div>
                                <div class="col-10 ps-4">
                                    <div class="form-floating">
                                        <textarea class="p-2" placeholder="Share your thougths" id="reviewAnime"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn custom-btn" type="button" onclick="publishReview(<?= $sessionData->userId ?>, <?= $animeData[0]['idAnime'] ?>)">Publish</button>
                            </div>                            
                        </div>
                        <?php } ?>
                        <?php foreach ($reviews as $key => $review) {
                        ?>
                        <div class="d-flex flex-row mb-4 align-items-stretch my-4 white-container p-4">
                            <div class="col-2 text-center">
                                <img class="img-fluid my-2" src="<?= base_url('assets/pictures')."/".$review['profilePic'] ?>">
                                <a class="profile-link" href="<?= $fullPath."/profile"."/".$review['idUser'] ?>"><?= $review['username'] ?></a>
                                <p class="engagement my-2"><strong><?= $review['likes'] ?><span class='bx bxs-hot'></span></strong></p>
                                <p class="my-2 publication-date"><?= $review['date'] ?></p>
                            </div>
                            <div class="col-10 ps-4">
                                <p><?= substr($review['content'], 0 , 500) ?>...</p>
                                <a href="<?= $fullPath."/details"."/".$review['idReview'] ?>" class="more">See more</a>
                            </div>
                        </div>
                        <?php
                        }?>
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