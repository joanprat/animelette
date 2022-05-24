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
// ? Review functions
/**
 *
 * @param item Like button
 * @param idReview Id of the review
 * @param idUser Id of the user who wrote this review
 * @param currentUser Current user id
 */
function likeReview(item, idReview, idUser, currentUser) {
    if (currentUser != null) {
        var total = document.getElementsByClassName('totalEngagement' + idUser);
        var newTotal = parseInt(total[0].textContent);
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var reviewEng = document.getElementById('reviewEngagement' + idReview);
                var reviewContainer = document.getElementById('reviewContainer' + idReview);
                var newReviewEng = parseInt(reviewEng.textContent);
                if (this.responseText == 'Like') {
                    item.className = 'like m-0 engagement';
                    reviewContainer.className = 'review-container my-5 active-review';
                    ++newTotal;
                    for (let i = 0; i < total.length; i++) {
                        total[i].innerHTML = "<span class='bx bxs-hot'></span>" + newTotal;
                    }
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + ++newReviewEng;
                }
                else {
                    item.className = 'like m-0';
                    reviewContainer.className = 'review-container my-5';
                    --newTotal;
                    for (let i = 0; i < total.length; i++) {
                        total[i].innerHTML = "<span class='bx bxs-hot'></span>" + newTotal;
                    }
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + --newReviewEng;
                }
            }
        };
        req.open('POST', '../assets/ajax/likeReview.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refUser=' + currentUser + "&refReview=" + idReview + "&engagement=" + newTotal + "&userWritter=" + idUser);
        item.className = item.className == 'like m-0' ? 'like m-0 engagement' : 'like m-0';
    }
    else {
        alert('You must be logged in to to rate user reviews');
    }
}
function likeReviewDetails(item, idReview, idUser, currentUser) {
    if (currentUser != null) {
        var tmp = document.getElementById('total-engagement');
        var totalEngagement = parseInt(tmp.textContent);
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var reviewEng = document.getElementById('reviewEngagement' + idReview);
                var btn1 = document.getElementById('btn-fire-1');
                var btn2 = document.getElementById('btn-fire-2');
                var newReviewEng = parseInt(reviewEng.textContent);
                if (this.responseText == 'Like') {
                    btn1.className = 'fire p-2 fire-button-disabled fire-button-enabled';
                    btn2.className = 'p-2 mt-4 btn-long fire-button-disabled fire-button-enabled';
                    tmp.innerText = '' + ++totalEngagement;
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + ++newReviewEng;
                }
                else {
                    btn1.className = 'fire p-2 fire-button-disabled';
                    btn2.className = 'p-2 mt-4 btn-long fire-button-disabled';
                    tmp.innerText = '' + --totalEngagement;
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + --newReviewEng;
                }
            }
        };
        req.open('POST', '../../assets/ajax/likeReview.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refUser=' + currentUser + "&refReview=" + idReview + "&engagement=" + totalEngagement + "&userWritter=" + idUser);
        item.className = item.className == 'like m-0' ? 'like m-0 engagement' : 'like m-0';
    }
    else {
        alert('You must be logged in to to rate user reviews');
    }
}
