// ? Userprofile functions
function follow (item:HTMLButtonElement, idCurrentUser:number) {
    var req:XMLHttpRequest = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    } 
    req.open('POST', '../../assets/ajax/follow.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send('refUser=' + item.value + "&refUserFollower=" + idCurrentUser);
    item.innerText = item.textContent == 'Follow' ? 'Following' : 'Follow';
    item.className = item.className == 'btn btn-pink me-2' ? 'btn btn-pink-active me-2' : 'btn btn-pink me-2';
}

// ? Animelist functions
function updateEpisodes (idAnime:number, idUser:number, maxEpisodes:number, action:number) {
    var req:XMLHttpRequest = new XMLHttpRequest();
    var counterNode:HTMLElement = document.getElementById('episodeCounter' + idAnime)!;
    var episodes:number = parseInt (document.getElementById('episodeCounter' + idAnime)?.textContent!);
    var updateEpisode:number = action == 1 ? ++episodes : --episodes;
    if (episodes >= 0 && episodes <= maxEpisodes) {
        req.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                if (this.response == 1) {
                    console.log('Episodes updated successfully - AJAX Req');
                    counterNode.innerText = '' + updateEpisode;
                }else {
                    console.log('Error updating episodes - AJAX Req');
                }
                
            }
        } 
        req.open('POST', '../../../assets/ajax/updateList.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refAnime=' + idAnime + "&refUser=" + idUser + "&episodeUpdate=" + updateEpisode);
    }
}

function updateScore (idAnime:number, idUser:number, action:number) {
    var req:XMLHttpRequest = new XMLHttpRequest();
    var counterNode:HTMLElement = document.getElementById('scoreAnime' + idAnime)!;
    var score:number = parseInt (document.getElementById('scoreAnime' + idAnime)?.textContent!);
    var updateScore:number = action == 1 ? ++score : --score;
    if (score >= 0 && score <= 10) {
        req.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.response == 1) {
                    console.log('Score updated successfully - AJAX Req');
                    counterNode.innerText = '' + updateScore;
                }else {
                    console.log('Error updating score - AJAX Req');
                }
                
            }
        } 
        req.open('POST', '../../../assets/ajax/updateScore.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refAnime=' + idAnime + "&refUser=" + idUser + "&scoreUpdate=" + updateScore);
    }
}

function updateStatus (idAnime:number, idUser:number, newStatus:string) {
    var req:XMLHttpRequest = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            if (this.response == 1) {
                console.log('Status updated successfully - AJAX Req');
            }else {
                console.log('Error updating status - AJAX Req');
            }
            
        }
    } 
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
function likeReview(item:HTMLParagraphElement, idReview:number, idUser:number, currentUser:number) {
    if ( currentUser != null) {
    var total:HTMLCollection = document.getElementsByClassName('totalEngagement' + idUser)!;
        var newTotal:number = parseInt(total[0].textContent!);
        var req:XMLHttpRequest = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var reviewEng:HTMLElement = document.getElementById('reviewEngagement' + idReview)!;
                var reviewContainer:HTMLElement = document.getElementById('reviewContainer' + idReview)!;

                var newReviewEng:number = parseInt(reviewEng.textContent!);
                if (this.responseText == 'Like') {
                    item.className = 'like m-0 engagement';
                    reviewContainer.className = 'review-container my-5 active-review';
                    ++newTotal;
                    for(let i:number = 0; i < total.length; i++) {
                        total[i].innerHTML = "<span class='bx bxs-hot'></span>" + newTotal;
                    }
                    
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + ++newReviewEng;
                }else {
                    item.className = 'like m-0';
                    reviewContainer.className = 'review-container my-5';
                    --newTotal;
                    for(let i:number = 0; i < total.length; i++) {
                        total[i].innerHTML = "<span class='bx bxs-hot'></span>" + newTotal;
                    }
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + --newReviewEng;              
                }
            }
        } 
        req.open('POST', '../assets/ajax/likeReview.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refUser=' + currentUser + "&refReview=" + idReview + "&engagement=" + newTotal + "&userWritter=" + idUser);
        item.className = item.className == 'like m-0' ? 'like m-0 engagement' : 'like m-0';
    }else {
        alert('You must be logged in to to rate user reviews');
    }
}

function likeReviewDetails(item:HTMLParagraphElement, idReview:number, idUser:number, currentUser:number) {
    if ( currentUser != null) {
        var tmp:HTMLElement = document.getElementById('total-engagement')!;
        var totalEngagement:number = parseInt(tmp.textContent!);
        var req:XMLHttpRequest = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var reviewEng:HTMLElement = document.getElementById('reviewEngagement' + idReview)!;
                var btn1:HTMLElement = document.getElementById('btn-fire-1')!;
                var btn2:HTMLElement = document.getElementById('btn-fire-2')!;

                var newReviewEng:number = parseInt(reviewEng.textContent!);
                if (this.responseText == 'Like') {
                    btn1.className = 'fire p-2 fire-button-disabled fire-button-enabled';
                    btn2.className = 'p-2 mt-4 btn-long fire-button-disabled fire-button-enabled';
                    tmp.innerText = '' + ++totalEngagement;
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + ++newReviewEng;
                }else {
                    btn1.className = 'fire p-2 fire-button-disabled';
                    btn2.className = 'p-2 mt-4 btn-long fire-button-disabled';
                    tmp.innerText = '' + --totalEngagement;
                    reviewEng.innerHTML = "<span class='bx bxs-hot'></span>" + --newReviewEng;              
                }
            }
        } 
        req.open('POST', '../../assets/ajax/likeReview.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refUser=' + currentUser + "&refReview=" + idReview + "&engagement=" + totalEngagement + "&userWritter=" + idUser);
        item.className = item.className == 'like m-0' ? 'like m-0 engagement' : 'like m-0';
    }else {
        alert('You must be logged in to to rate user reviews');
    }
}