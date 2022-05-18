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

function minus (idAnime:number, idUser:number, maxEpisodes:number) {
    var req:XMLHttpRequest = new XMLHttpRequest();
    var counterNode:HTMLElement = document.getElementById('episodeCounter' + idAnime)!;
    var episodes:number = parseInt (document.getElementById('episodeCounter' + idAnime)?.textContent!);
    if (episodes > 0) {
        var updateEpisode:number = --episodes;
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

function plus (idAnime:number, idUser:number, maxEpisodes:number) {
    var req:XMLHttpRequest = new XMLHttpRequest();
    var counterNode:HTMLElement = document.getElementById('episodeCounter' + idAnime)!;
    var episodes:number = parseInt (document.getElementById('episodeCounter' + idAnime)?.textContent!);
    if (episodes < maxEpisodes) {
        var updateEpisode:number = ++episodes;
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