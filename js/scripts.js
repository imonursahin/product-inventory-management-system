function init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 100,
            header = document.querySelector("header");
            sub_header = document.querySelector("#sub-menu");
        if (distanceY > shrinkOn) {
            classie.add(header,"smaller");
            classie.add(sub_header,"smaller");
        } else {
            if (classie.has(header,"smaller")) {
                classie.remove(header,"smaller");
                classie.remove(sub_header,"smaller");
            }
        }
    });
}
window.onload = init();