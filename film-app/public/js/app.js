

// The function to get the films from a specific decade

async function getFilms(decade) {
  const url = "json/films/" + decade;
    try {
      const response = await fetch(url);
      const films = await response.json();
      updateFilmList(films);
    } catch (error) {
      console.error(error.message);
    }
  }

//The function to get the films from a decade
function changeDecade(event){
    // stop the default link action
    event.preventDefault()
    // get the text inside the selected <a> element
    const decade = event.target.innerHTML;
    updateFilmsHeading(decade);
    getFilms(decade);
}

//The function to update the heading
function updateFilmsHeading(decade) {
    // get hold of the HTML element with an id of filmsHeading
    const filmsHeading = document.querySelector("#filmsHeading");
    //change the content of this element e.g. <h1>2010s</h1>
    filmsHeading.innerHTML = "Films from the " + decade + "s";
}

//The function to update the film list
function updateFilmList(films){
    // get hold of <div id="filmListHolder">
    const filmListHolder = document.querySelector("#filmListHolder");
    // clear out the contents of the this div
    filmListHolder.innerHTML="";
    //loop over the array of films
    films.forEach((film) => {
        //create a new <a></a> element
        const filmLink = document.createElement("a");
        //change the content of this element e.g. <a>Winter's Bone</a>
        filmLink.innerHTML = film.title;
        //set the href attribute on this element e.g. <a href="/films/3">Winter's Bone</a>
        filmLink.setAttribute("href", "/films/"+film.id);
        //create a new <p></p> element
        const filmLinkPara = document.createElement("p");
        //put the <a> inside the <p> e.g. <p><a href="#">Winter's Bone</a></p>
        filmLinkPara.appendChild(filmLink);
        //put the <p> inside the parent <div> e.g. <div id="filmListHolder"><p><a href="#">Winter's Bone</a></p></div>
        filmListHolder.appendChild(filmLinkPara);
      });
}

// The function to get the films from a decade
function init(){
    // get hold of the HTML elements that have a class of decade-link
    const decadeLinks = document.querySelectorAll(".decade-link");
    // loop over these <a> elements
    decadeLinks.forEach(function(link){
        //when the user clicks on a link run the function changeDecade()
        link.addEventListener("click",changeDecade,false);
    })
  }


//call the function init() when the page loads
init();
