"use strict";
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
function minus(idAnime, idUser, maxEpisodes) {
    var _a;
    var req = new XMLHttpRequest();
    var counterNode = document.getElementById('episodeCounter' + idAnime);
    var episodes = parseInt((_a = document.getElementById('episodeCounter' + idAnime)) === null || _a === void 0 ? void 0 : _a.textContent);
    if (episodes > 0) {
        var updateEpisode = --episodes;
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
function plus(idAnime, idUser, maxEpisodes) {
    var _a;
    var req = new XMLHttpRequest();
    var counterNode = document.getElementById('episodeCounter' + idAnime);
    var episodes = parseInt((_a = document.getElementById('episodeCounter' + idAnime)) === null || _a === void 0 ? void 0 : _a.textContent);
    if (episodes < maxEpisodes) {
        var updateEpisode = ++episodes;
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
