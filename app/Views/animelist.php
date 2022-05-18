<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animelette</title>
    <!-- Custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom-styles.css')?>">
    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
</head>
<?php $fullPath = base_url('Home') ?>
<body class="animelist-body">
    <nav class="navbar navbar-expand-lg">
        <div class="container text-cemter">
            <a class="navbar-brand" href="<?= $fullPath ?>">ANIMELETTE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
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
                            <li class="nav-item dropdown align-self-center">
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
                        </ul>                         
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="container-fluid text-center mt-4">
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
                        <tr>
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
                                    <img class="big d-md-none d-lg-none d-xl-none" src="<?= base_url('assets/img')."/".$anime['img'] ?>" alt="Anime<?= $key ?>">
                                    <img class="small d-none d-md-block" src="<?= base_url('assets/img')."/".$anime['img'] ?>" alt="Anime<?= $key ?>">
                                </td>
                                <td><a href="<?= $fullPath."/anime"."/".$anime['idAnime'] ?>"><?= $anime['nameJap'] ?></a></td>
                                <?php
                                    if(isset($currentUser)) {
                                ?>
                                <!-- If the current user is the owner of the list -->
                                <td>
                                    <span class="bi bi-dash-circle-fill me-2 red-icon" onclick="minus(<?= $anime['idAnime'] ?>, <?= $sessionData->userId ?>, <?= $maxEpi = $anime['totalEpisodes'] == NULL ? 10000 : $anime['totalEpisodes'] ?>)"></span>
                                    <span class="episode-counter" id="episodeCounter<?= $anime['idAnime'] ?>"><?= $anime['episodeSeen'] ?></span>
                                    <?= " / ".$anime['totalEpisodes'] ?>
                                    <span class="ms-2 bi bi-plus-circle-fill green-icon"onclick="plus(<?= $anime['idAnime'] ?>, <?= $sessionData->userId ?>, <?= $maxEpi = $anime['totalEpisodes'] == NULL ? 10000 : $anime['totalEpisodes'] ?>)"></span>
                                </td>                                        
                                    
                                <?php
                                    }else {
                                ?>
                                <!-- If the current user is NOT the owner of the list -->
                                <td><?= $anime['episodeSeen']." / ".$anime['totalEpisodes'] ?></td>
                                <?php
                                    }
                                
                                ?>
                                <td><?= $anime['score'] ?></td>
                                <td><?= $anime['type'] ?></td>
                                <td><?= $anime['season']." ".$anime['yearBroadcast'] ?></td>
                                <td>
                                    <?php
                                    switch($anime['status']) {
                                        case 'watching':
                                            echo "<p class=\"green\">Watching</p>";
                                            break;
                                        case 'completed':
                                            echo "<p class=\"blue\">Completed</p>";
                                            break;
                                        case 'on hold':
                                            echo "<p class=\"yellow\">On Hold</p>";
                                            break;
                                        case 'dropped':
                                            echo "<p class=\"red\">Dropped</p>";
                                            break;
                                        case 'planning':
                                            echo "<p class=\"grey\">Planning</p>";
                                            break;
                                    }
                                    
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </article>

        <?php
            switch($typeList) {
                case 0:
                    echo "All";
                    break;
                case 1:
                    echo "Watching";
                    break;
                case 2:
                    echo "Completed";
                    break;
                case 3:
                    echo "On Hold";
                    break;
                case 4:
                    echo "Dropped";
                    break;
                case 5:
                    echo "Planning";
                    break;
            }
        ?>
    </section>
</body>
</html>