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
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php $fullPath = base_url('Home') ?>
<body class="animelist-body">
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
    <section class="container-fluid text-center mt-4">
        <article class="custom-container-2 white-container list-user mb-4">
            <div class="container">
                <div class="d-flex flex-row py-4">
                    <div class="col-3 align-self-center">
                        <a href="<?= $fullPath."/profile"."/".$userData['idUser'] ?>"><img src="<?= base_url('assets/pictures')."/".$userData['profilePic'] ?>" alt="Anime list owner profile pic"></a>
                    </div>
                    <div class="col-9 align-self-center">
                        <p><a href="<?= $fullPath."/profile"."/".$userData['idUser'] ?>"><?= $userData['username'] ?></a>'s anime list</p>
                        <p class="engagement"><?= $userData['engagement'] ?> <span class='bx bxs-hot'></span></p>
                    </div>
                </div>
            </div>
        </article>
        <article class="container list px-0">
            <div class="container-fluid navbar-animelist">
                <ul class="d-flex flex-row navbar-nav align-items-center mx-5 py-2">
                    <li class="nav-item me-4">
                        <a class="nav-link <?= $typeList == 0 ? 'active-item' : ''  ?>" aria-current="page" href="<?= $fullPath."/animelist"."/".$userData['idUser']."/0" ?>">All anime</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?= $typeList == 1 ? 'active-item' : ''  ?>" aria-current="page" href="<?= $fullPath."/animelist"."/".$userData['idUser']."/1" ?>">Watching</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?= $typeList == 2 ? 'active-item' : ''  ?>" aria-current="page" href="<?= $fullPath."/animelist"."/".$userData['idUser']."/2" ?>">Completed</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?= $typeList == 3 ? 'active-item' : ''  ?>" aria-current="page" href="<?= $fullPath."/animelist"."/".$userData['idUser']."/3" ?>">On Hold</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?= $typeList == 4 ? 'active-item' : ''  ?>" aria-current="page" href="<?= $fullPath."/animelist"."/".$userData['idUser']."/4" ?>">Dropped</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?= $typeList == 5 ? 'active-item' : ''  ?>" aria-current="page" href="<?= $fullPath."/animelist"."/".$userData['idUser']."/5" ?>">Planning</a>
                    </li>
                </ul>
            </div>
            <div class="anime-table container">
                <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr id="tr-head">
                            <th scope="col">Anime</th>
                            <th scope="col">Name</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Score</th>
                            <th scope="col">Type</th>
                            <th scope="col">Season</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($animelist as $key => $anime) { ?>
                            <!-- this.style.backgroundImage = 'url(<?= base_url('assets/img').'/'.$anime['banner'] ?>)' -->
                            <!-- <tr class="align-middle"> -->
                            <tr class="align-middle" onmouseover="this.style.background = 'linear-gradient(#323232c5, #323232c5), url(<?= base_url('assets/img').'/'.$anime['banner'] ?>), no-repeat'; this.style.backgroundSize = 'cover'" onmouseout="this.style.backgroundImage = 'none';">
                                <td>
                                    <a href="<?= $fullPath."/anime"."/".$anime['idAnime'] ?>"><img class="big d-md-none d-lg-none d-xl-none" src="<?= base_url('assets/img')."/".$anime['img'] ?>" alt="Anime<?= $key ?>"></a>
                                    <a href="<?= $fullPath."/anime"."/".$anime['idAnime'] ?>"><img class="small d-none d-md-block" src="<?= base_url('assets/img')."/".$anime['img'] ?>" alt="Anime<?= $key ?>"></a>
                                </td>
                                <td><a href="<?= $fullPath."/anime"."/".$anime['idAnime'] ?>"><?= $anime['nameJap'] ?></a></td>
                                <?php
                                    if(isset($currentUser)) {
                                ?>
                                <!-- If the current user is the owner of the list -->
                                <td>
                                    <span class="bi bi-dash-circle-fill me-2 red-icon" onclick="updateEpisodes(<?= $anime['idAnime'] ?>, <?= $sessionData->userId ?>, <?= $maxEpi = $anime['totalEpisodes'] == NULL ? 10000 : $anime['totalEpisodes'] ?>, 0)"></span>
                                    <span class="episode-counter" id="episodeCounter<?= $anime['idAnime'] ?>"><?= $anime['episodeSeen'] ?></span>
                                    <?= " / ".$anime['totalEpisodes'] ?>
                                    <span class="ms-2 bi bi-plus-circle-fill green-icon"onclick="updateEpisodes(<?= $anime['idAnime'] ?>, <?= $sessionData->userId ?>, <?= $maxEpi = $anime['totalEpisodes'] == NULL ? 10000 : $anime['totalEpisodes'] ?>, 1)"></span>
                                </td>
                                <td>
                                    <span class="bi bi-dash-circle-fill me-2 red-icon" onclick="updateScore(<?= $anime['idAnime'] ?>, <?= $sessionData->userId ?>, 0)"></span>
                                    <span class="episode-counter" id="scoreAnime<?= $anime['idAnime'] ?>"><?= $anime['score'] ?></span>
                                    <span class="ms-2 bi bi-plus-circle-fill green-icon"onclick="updateScore(<?= $anime['idAnime'] ?>, <?= $sessionData->userId ?>, 1)"></span>
                                </td>                                 
                                    
                                <?php
                                    }else {
                                ?>
                                <!-- If the current user is NOT the owner of the list -->
                                <td><?= $anime['episodeSeen']." / ".$anime['totalEpisodes'] ?></td>
                                <td><?= $anime['score'] ?></td>
                                <?php
                                    }
                                
                                ?>
                                <td><?= $anime['type'] ?></td>
                                <td><?= $anime['season']." ".$anime['yearBroadcast'] ?></td>
                                <?php 
                                    if (isset($currentUser)) {
                                        switch($anime['status']) {
                                            case 'watching':
                                                $color = 'green';
                                                break;
                                            case 'completed':
                                                $color = 'blue';
                                                break;
                                            case 'on hold':
                                                $color = 'yellow';
                                                break;
                                            case 'dropped':
                                                $color = 'red';
                                                break;
                                            case 'planning':
                                                $color = 'grey';
                                                break;
                                        }
                                ?>
                                <td>
                                    <select class="m-2 <?= $color ?>" name="score" onchange="updateStatus(<?= $anime['idAnime'] ?>, <?= $sessionData->userId ?>, this.value)">
                                        <option class="green" value="watching" <?= $anime['status'] == 'watching' ? 'selected' : '' ?>>Watching</option>
                                        <option class="blue" value="completed" <?= $anime['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                        <option class="yellow" value="on hold" <?= $anime['status'] == 'on hold' ? 'selected' : '' ?>>On Hold</option>
                                        <option class="red" value="dropped" <?= $anime['status'] == 'dropped' ? 'selected' : '' ?>>Dropped</option>
                                        <option class="grey" value="planning" <?= $anime['status'] == 'planning' ? 'selected' : '' ?>>Planning</option>                                     
                                    </select>
                                </td>
                                <?php
                                    }else {
                                ?>
                                <td>
                                    <?php
                                    switch($anime['status']) {
                                        case 'watching':
                                            echo "<p class=\"green m-0 p-0\">Watching</p>";
                                            break;
                                        case 'completed':
                                            echo "<p class=\"blue m-0 p-0\">Completed</p>";
                                            break;
                                        case 'on hold':
                                            echo "<p class=\"yellow m-0 p-0\">On Hold</p>";
                                            break;
                                        case 'dropped':
                                            echo "<p class=\"red m-0 p-0\">Dropped</p>";
                                            break;
                                        case 'planning':
                                            echo "<p class=\"grey m-0 p-0\">Planning</p>";
                                            break;
                                    }
                                    
                                    ?>
                                </td>
                                <?php
                                    }
                                ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </article>
    </section>
    <footer class='container-fluid py-5 mt-4'>
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