var btn=document.getElementById('createcontent');
// Add Content Open Button Function
function my()
{
    const footer= document.getElementById("footer");
    const card=document.querySelector('.mcard');
    footer.style.visibility="hidden";
      
        card.style.visibility="visible";
   
}
// Add Content Close Button Function
function closeBtn()
{
    const footer= document.getElementById("footer");
    footer.style.visibility="visible";
    const card=document.querySelector('.mcard');
    card.style.visibility="hidden";
}
//Singup and login card Rotate Button Function
var flag=true;
function Rotate()
{
    const cardback=document.querySelector('.card-inner');
    const cardfront=document.querySelector('.card-front');
    if(flag)
    {
        cardback.style.transform='rotateY(180deg)';
        flag=false;
    }
    else{
        cardback.style.transform='rotateY(0deg)';
        flag=true;
    }
   
}
// SignUp and login card visible Button Function
function Signout(){
$card=document.querySelector('.cover');
$card.style.visibility='visible';


}
function closecover()
{
    const cover=document.querySelector('.cover');
    cover.style.visibility='hidden';
}

var count1=true;
var count2=true;
// Password visible and hide  Button Function for login
function Visiblepasswordlogin()
{
var password=document.querySelector('#password1');
var btn=document.querySelector('#visiblebtn1');
const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            console.log("ashkdh");
            if (count1) {
                btn.innerHTML="hide";
                count1=false;
            } else {
                btn.innerHTML="show";
                count1=true;
            }

            
}
// Password visible and hide  Button Function for Signup
function Visiblepasswordsign()
{
var password=document.querySelector('#password2');
var btn=document.querySelector('#visiblebtn2');
const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            console.log("ashkdh");
            if (count2) {
                btn.innerHTML="hide";
                count2=false;
            } else {
                btn.innerHTML="show";
                count2=true;
            }

}
window.onscroll = function() {myFunction()};

function myFunction() {
    const footer= document.getElementById("footer");
  if (document.documentElement.scrollTop > 550) {
  
   footer.style.visibility="hidden";
   console.log("shd");
  } else {
    footer.style.visibility="visible";
    console.log("sdfsj");
  }
}