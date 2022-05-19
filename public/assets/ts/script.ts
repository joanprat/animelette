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