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

function swapExplorer(){
    var selectUserOrAnime:any = document.getElementById("selectUserOrAnime");
    var animeSearcher:any = document.getElementById("animeSearcher");
    animeSearcher.innerHTML="";

    if(selectUserOrAnime.value == "User"){

            var usersDiv:any = document.getElementById("usersDiv");
            usersDiv.innerHTML+='<input type="text" id="exploreUserBar" placeholder="Type here the name of the user you are looking for" class="p-3 mb-5"  onkeyup="searchUser()">';
            usersDiv.innerHTML+=`<div id="showUsers" class="row"></div>`;
        

    }if(selectUserOrAnime.value == "Anime"){
        var usersDiv:any = document.getElementById("usersDiv");
        usersDiv.innerHTML = "";
        var minYearIn:any = document.getElementById("minYear");
        var minYear:number = parseInt(minYearIn.value);
        var maxYearIn:any = document.getElementById("maxYear");
        var maxYear:number = parseInt(maxYearIn.value);

        var animeSearcher:any = document.getElementById("animeSearcher");
        
        var res:string = `
        <input type="text" id="exploreBar" placeholder="Type here the name of the anime you want to search" onkeyup="search()" class="p-3 mb-4">

        <div class="row mb-5" id="listUsers">
        
                <div class="col">
                    <select id="selectGenre" onchange="search()">
                        <option default value="Any">Genre</option>
                        <option>Shoujo</option>
                        <option>Shounen</option>
                        <option>Seinen</option>
                        <option>Josei</option>
                        <option>Action</option>
                        <option>Comedy</option>
                        <option>Fantasy</option>
                        <option>Ecchi</option>
                        <option>Horror</option>
                        <option>Mecha</option>
                        <option>Mahou Shoujo</option>
                        <option>Sci-Fi</option>
                        <option>Psychological</option>
                        <option>Romance</option>
                        <option>Drama</option>
                        <option>Mistery</option>
                        <option>Adventure</option>
                        <option>Slice of Life</option>
                        <option>Sports</option>
                        <option>Supernatural</option>
                        <option>Avant Garde</option>
                        <option>Boys Love</option>
                        <option>Girls Love</option>
                        <option>Gourmet</option>
                        <option>Harem</option>
                    </select>
                </div>

                <div class="col">
                        <select id='selectYear' onchange='search()'>
                            <option styles='width: 300px' default value="Any">Year</option>
                            `;
                            for (var i=minYear; i < maxYear; i++) { 
                                res += `<option styles='width: 300px'>` + i + `</option>`;
                            }
                res += `
                    </select>
                    
                </div>

                <div class="col">
                    <select id="selectSeason" onchange="search()">
                        <option default value="Any">Season</option>
                        <option>Winter</option>
                        <option>Fall</option>
                        <option>Spring</option>
                        <option>Summer</option>
                    </select>
                </div>

                <div class="col">
                    <select id="selectFormat" onchange="search()">
                        <option default value="Any">Format</option>
                        <option>TV</option>
                        <option>Movie</option>
                        <option>OVA</option>
                        <option>Special</option>
                    </select>
                </div>
        </div>
    <div>

    <div id="listAnimes" class="row mb-5"></div>`;
    animeSearcher.innerHTML = res;
    }
}  

function search(){

    var exploreBar:any = document.getElementById("exploreBar");
    var selectGenre:any = document.getElementById("selectGenre");
    var selectYear:any = document.getElementById("selectYear");
    var selectSeason:any = document.getElementById("selectSeason");
    var selectFormat:any = document.getElementById("selectFormat");
    var listAnimes:any = document.getElementById("listAnimes");
    var showAnimes:any = document.getElementById("showAnimes");

    var variableAjax = new XMLHttpRequest();

    variableAjax.onreadystatechange = function () {     
        while(listAnimes.hasChildNodes()){
            listAnimes.removeChild(listAnimes.firstChild);
        }
        if (variableAjax.readyState == 4) {            
            var result = variableAjax.responseText;

            console.log(variableAjax.responseText);
            let datos = JSON.parse(result);

            for (let item of datos) {
                
            listAnimes.innerHTML += `
                    <div class='col'>
                        <div class='animeImg'>
                        <a href='anime/${item.idAnime}'><img src='../assets/img/${item.img}'></a><br>
                        </div>
                        <strong><a href='anime/${item.idAnime}'>${item.nameEng}</a></strong><br>
                        <i>${item.nameJap}</i><br>
                        <i>${item.yearBroadcast}</i>
                    </div>`;
            }
        }
        showAnimes.style.display = "none";
    }
            variableAjax.open("POST",'../assets/ajax/search.php',true);    
            variableAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");   
            variableAjax.send("title=" + exploreBar.value + "&selectGenre=" + selectGenre.value + "&selectYear=" + selectYear.value + "&selectSeason=" + selectSeason.value + "&selectFormat=" + selectFormat.value);
}

function searchUser(){

    var exploreUserBar:any = document.getElementById("exploreUserBar");
    var showUsers:any = document.getElementById("showUsers");
    var showAnimes:any = document.getElementById("showAnimes");
    showAnimes.style.display = "flex";
    

    var variableAjax = new XMLHttpRequest();

    variableAjax.onreadystatechange = function () {     
        while(showUsers.hasChildNodes()){
            showUsers.removeChild(showUsers.firstChild);
        }
        if (variableAjax.readyState == 4) {    
            
            var result = variableAjax.responseText;

            let datos = JSON.parse(result); 
            for (let item of datos) {
                
                showUsers.innerHTML += `
                        <div class='col profilePic'>
                            <a href='profile/${item.idUser}'><img src='../assets/pictures/${item.profilePic}'></a><br>
                            <strong class='me-2'><a href='profile/${item.idUser}' class='usernameLink'>${item.username}</a></strong><br> 
                            <span class='bx bxs-hot' style='color: red;'></span><strong><span style='color: red;'>${item.engagement}</span></strong>
                        </div>`;
            }
        }
    }
            variableAjax.open("POST",'../assets/ajax/selectUsers.php',true);    
            variableAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");   
            variableAjax.send("exploreUserBar=" + exploreUserBar.value);
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

function publishReview(idUser:number, idAnime:number) {
    var review:any = document.getElementById('reviewAnime')!;
    if(review.value != '') {
        var req:XMLHttpRequest = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                if(this.responseText == '1') {
                    var tmp:HTMLElement = document.getElementById('review-publish')!;
                    tmp.innerHTML = '';
                    var div:HTMLElement = document.createElement('div');
                    div.className = 'container text-center container-success p-4';
                    var txt:HTMLParagraphElement = document.createElement('p');
                    txt.className = 'p-0 m-0';
                    txt.appendChild(document.createTextNode('Review published successfully'));
                    div.appendChild(txt);
                    tmp.appendChild(div);
                }else {
                    alert('Error publishing the review');
                }
            }
        }
        req.open('POST', '../../assets/ajax/publishReview.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refUser=' + idUser + "&refAnime=" + idAnime + "&content=" + review.value);
    }else {
        review.focus();
    }
}

function addAnimeToList (btn:HTMLButtonElement, idUser:number, idAnime:number, maxCap:number) {
    var form:any = document.getElementsByClassName('add-anime')!;
    var isEmpty = false;
    for (let i:number = 0; i < form.length; i++) {
        if (form[i].style.visibility == '') {
            form[i].style.visibility = 'visible';
        }
        if (form[i].value == '') {
            isEmpty = true;
        }
    }

    if(!isEmpty) {
        form[0].value = form[0].value > maxCap ? maxCap : form[0].value;
        form[1].value = form [1].value > 10 ? 10 : form [1].value;
        form[0].value = form[0].value < 0 ? 0 : form[0].value;
        form[1].value = form [1].value < 0 ? 0 : form [1].value;
        var req:XMLHttpRequest = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if(this.response == "true") {
                    var tmp:HTMLElement = document.getElementById('user-anime-status')!;
                    tmp.innerHTML = '';
                    var div:HTMLElement = document.createElement('div');
                    div.className = 'container text-center container-success p-4';
                    var txt:HTMLParagraphElement = document.createElement('p');
                    txt.className = 'p-0 m-0';
                    txt.appendChild(document.createTextNode('New anime added to your list!'));
                    div.appendChild(txt);
                    tmp.appendChild(div);
                }else {
                    alert('Error adding anime to list');
                }
            }
        }
        req.open('POST', '../../assets/ajax/updateAnime.php', true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send('refUser=' + idUser + "&refAnime=" + idAnime + "&caps=" + form[0].value + "&score=" + form[1].value + "&status=" + form[2].value);
    }
}
function removeAnimeFromList (idUser:number, idAnime:number) {
    var req:XMLHttpRequest = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.response == "true") {
                var tmp:HTMLElement = document.getElementById('user-anime-status')!;
                tmp.innerHTML = '';
                var div:HTMLElement = document.createElement('div');
                div.className = 'container text-center container-success p-4';
                var txt:HTMLParagraphElement = document.createElement('p');
                txt.className = 'p-0 m-0';
                txt.appendChild(document.createTextNode('Anime deleted successfully'));
                div.appendChild(txt);
                tmp.appendChild(div);
            }else {
                alert('Error deletting anime from list');
            }
        }
    }
    req.open('POST', '../../assets/ajax/updateAnime.php', true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send('refUser=' + idUser + "&refAnime=" + idAnime);
}