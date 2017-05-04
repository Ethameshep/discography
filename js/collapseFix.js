//auto uncollapses nav if the button dsiplay changes to none
//var isCollapsed = (document.getElementById("navList").style.display == "none");
//var isHidden = (document.getElementById("navButton").style.display == "none");

function navCheck() {

   // var navList = document.getElementsByClassName("collapse");

    if(window.innerWidth > 1280) {
        $(".collapse").collapse("show");
        console.log("element uncollapsing");
    }

}
