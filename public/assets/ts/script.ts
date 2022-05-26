
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
            usersDiv.innerHTML+='<input type="text" id="exploreUserBar" placeholder="Search a User" class="mb-5"  onkeyup="searchUser()">';
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
        <input type="text" id="exploreBar" placeholder="Search an Anime" onkeyup="search()" class="mb-5">

        <div class="row mb-5" id="listUsers">
        
                <div class="col">
                    <p>Genre</p>
                    <select id="selectGenre" onchange="search()">
                        <option default>Any</option>
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
                    <p>Year</p>
                        <select id='selectYear' onchange='search()'>
                            <option styles='width: 300px' default>Any</option>
                            `;
                            for (var i=minYear; i < maxYear; i++) { 
                                res += `<option styles='width: 300px'>` + i + `</option>`;
                            }
                res += `
                    </select>
                    
                </div>

                <div class="col">
                    <p>Season</p>
                    <select id="selectSeason" onchange="search()">
                        <option default>Any</option>
                        <option>Winter</option>
                        <option>Fall</option>
                        <option>Spring</option>
                        <option>Summer</option>
                    </select>
                </div>

                <div class="col">
                    <p>Format</p>
                    <select id="selectFormat" onchange="search()">
                        <option default>Any</option>
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
                        <a href=''><img src='../assets/img/${item.img}'></a><br>
                        </div>
                        <strong><a href=''>${item.nameEng}</a></strong><br>
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
                            <img src='../assets/pictures/${item.profilePic}'><br>
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