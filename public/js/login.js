// Get references to the input and img elements
window.onscroll = function() {myFunction()};

function myFunction() {
    const footer= document.getElementById("footer");
    const mm=document.documentElement.scrollTop 
  if (mm > 1050) {
  
   footer.style.visibility="hidden";
   console.log(mm);
  } else {
    footer.style.visibility="visible";
    console.log(mm);
  }
}