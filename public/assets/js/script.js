"use strict";
// ? Userprofile functions
function follow(item, idCurrentUser) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    req.open('POST', '../../assets/ajax/follow.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send('refUser=' + item.value + "&refUserFollower=" + idCurrentUser);
    item.innerText = item.textContent == 'Follow' ? 'Following' : 'Follow';
    item.className = item.className == 'btn btn-pink me-2' ? 'btn btn-pink-active me-2' : 'btn btn-pink me-2';
}
// ? Animelist functions
function updateEpisodes(idAnime, idUser, maxEpisodes, action) {
    var _a;
    var req = new XMLHttpRequest();
    var counterNode = document.getElementById('episodeCounter' + idAnime);
    var episodes = parseInt((_a = document.getElementById('episodeCounter' + idAnime)) === null || _a === void 0 ? void 0 : _a.textContent);
    var updateEpisode = action == 1 ? ++episodes : --episodes;
    if (episodes >= 0 && episodes <= maxEpisodes) {
        req.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response == 1) {
                    console.log('Episodes updated successfully - AJAX Req');
                    counterNode.innerText = '' + updateEpisode;
                }
                else {
                    console.log('Error updating episodes - AJAX Req');
                }
            }
        };
        req.open('POST', '../../../assets/ajax/updateList.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refAnime=' + idAnime + "&refUser=" + idUser + "&episodeUpdate=" + updateEpisode);
    }
}
function updateScore(idAnime, idUser, action) {
    var _a;
    var req = new XMLHttpRequest();
    var counterNode = document.getElementById('scoreAnime' + idAnime);
    var score = parseInt((_a = document.getElementById('scoreAnime' + idAnime)) === null || _a === void 0 ? void 0 : _a.textContent);
    var updateScore = action == 1 ? ++score : --score;
    if (score >= 0 && score <= 10) {
        req.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.response == 1) {
                    console.log('Score updated successfully - AJAX Req');
                    counterNode.innerText = '' + updateScore;
                }
                else {
                    console.log('Error updating score - AJAX Req');
                }
            }
        };
        req.open('POST', '../../../assets/ajax/updateScore.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refAnime=' + idAnime + "&refUser=" + idUser + "&scoreUpdate=" + updateScore);
    }
}
function updateStatus(idAnime, idUser, newStatus) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if (this.response == 1) {
                console.log('Status updated successfully - AJAX Req');
            }
            else {
                console.log('Error updating status - AJAX Req');
            }
        }
    };
    req.open('POST', '../../../assets/ajax/updateStatus.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send('refAnime=' + idAnime + "&refUser=" + idUser + "&statusUpdate=" + newStatus);
}
