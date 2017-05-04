//auto uncollapses nav if the button dsiplay changes to none
function navCheck() {
    if(window.innerWidth > 1280) {
        $(".collapse").collapse("show");
        console.log("element uncollapsing");
    }
}
