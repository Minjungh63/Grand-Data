menuBar.style.display = "none";

function hidemenuBar(){
    document.getElementById("menuBar").style.display = "inline-block";
}

const isMobile = () => {
    try {
      document.createEvent("TouchEvent");
      return true;
    } catch (e) {
      return false;
    }
};
  