var movie = [
    id=["ACT", "AHF", "ANM", "RMC"],
    day = ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],
    hour = ["T12", "T15", "T18", "T21"]
];

var seats = [
    STA = 0,
    STP = 0,
    STC = 0,
    FCA = 0,
    FCP = 0,
    FCC = 0
];

// var cust = [
//     name = "",
//     email = "",
//     mobile = "",
//     card = "",
//     expiryMonth = "",
//     expiryYear = "",
// ];

window.onscroll = function() {
    var sections = document.getElementsByTagName('main')[0].getElementsByTagName('section');
    var navlinks = document.getElementsByTagName('nav')[0].getElementsByTagName('a');
    var n = -1;
    while(n < sections.length-1 && sections[n+1].offsetTop <= window.scrollY+5) {
        n++;
    }

    for(var a=0; a<navlinks.length;a++){
        navlinks[a].classList.remove('menuclicked');
    }

    if(n>=0){
        navlinks[n].classList.add('menuclicked');
    }
}

function start() {
    //add listener to movie lists
    for(var a=0;a<movie[0].length;a++)
    {
        var x = document.getElementById(movie[0][a]);
        x.addEventListener('click', changeSynopsis);
    }

    //add listener to movie lists in drop down menu
    var navlinks = document.getElementsByTagName('nav')[0].getElementsByTagName('a');
    for(var a=3;a<navlinks.length;a++)
    {
        navlinks[a].addEventListener('click', changeSynopsis);
    }

    //add listener to button in synopsis
    var buttons = document.getElementsByTagName('button');
    for(var a=0; a<buttons.length-1;a++){
        buttons[a].addEventListener('click',changeBooking);
    }

    //add listener to select form for seat
    var select=document.getElementsByClassName('form')[0].getElementsByTagName('select'); 
    for(var a=0; a<select.length;a++){
        select[a].addEventListener('change',calculateCost);
    }

    // //add listener to input form for phone and credit card
    // var phone = document.getElementById('phone');
    // phone.addEventListener('change',phonenumber)
    // var card = document.getElementById('credit-card');
    // card.addEventListener('change',creditcard)
}


function changeSynopsis(e){  
    var synopsis=document.getElementsByTagName('article')[0].getElementsByTagName('div');
    for(var a=0; a<synopsis.length;a+=4)
    {
        synopsis[a].style.display = "none";
    }
    for(var a=0; a<e.path.length;a++)
    {
        for(var b=0;b<movie[0].length;b++)
        {
            if(e.path[a].id==movie[0][b] || e.path[a].className==movie[0][b])
            {
                var x = document.getElementById(movie[0][b]+"synopsis");
                x.style.display = "block";
            }
        }
    }
}

function changeBooking(e){
    for(i=0;i<seats.length;i++){
        seats[i]=0;
    }
    var x = document.getElementById("form");
    x.style.display = "block";  

    var label=document.getElementsByTagName('fieldset')[0].getElementsByTagName('label');  
    var input=document.getElementsByTagName('fieldset')[0].getElementsByTagName('input'); 
    label[0].innerHTML = e.path[0].className+" -";
    label[1].innerHTML = e.path[0].name+" -";
    label[2].innerHTML = e.path[0].value;
    input[0].value = e.path[0].className;
    input[1].value = e.path[0].name;
    input[2].value = e.path[0].value;
    
    var select=document.getElementsByClassName('form')[0].getElementsByTagName('select'); 
    for(var a=0; a<select.length;a++){
        select[a].selectedIndex=0;
    }
    var span=document.getElementById('cost');
    
    span.innerHTML="0.00";
}

function calculateCost(e) {
    let prices = [
        STA = ["STA", 14, 19],
        STP = ["STP", 12.5, 17.5],
        STC = ["STC", 11, 15.3],
        FCA = ["FCA", 24, 30],
        FCP = ["FCP", 22.5, 27],
        FCC = ["FCC", 21, 24]
    ];
    var span=document.getElementById('cost');
    var total=0;
    var input=document.getElementsByTagName('fieldset')[0].getElementsByTagName('input'); 
    var discount = checkDiscount(input[1].value, input[2].value);
    for(var a=0; a<prices.length;a++){
        var seatType= "seats-"+prices[a][0];
        if(e.path[0].id==seatType){
            seats[a]= parseInt(e.path[0].value);
        }
    }

    for( var i =0;i<seats.length;i++){
        if(discount){
            total+=prices[i][1]*seats[i];
        }
        else{
            total+=prices[i][2]*seats[i];
        }
    }
    span.innerHTML=total.toFixed(2);
}

function checkDiscount(day, time)
{
    if(day==="MON" || day==="WED")
    {
        return true;
    }

    for(var a=0; a<movie[1].length-2;a++) 
    {
        if(day===movie[1][a]&&time==="T12")
        {
            return true;
        }
    }
    return false;
}

function validation(){
    var isPhoneValid=false;
    var isCardValid=false;
    var phonenumber = document.getElementById('phone').value;
    var phoneRegex0 = /^\+?([0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})[-. ]?([0-9]{3})$/;
    var phoneRegex1 =/^04(\s?[0-9]{2}\s?)([0-9]{3}\s?[0-9]{3}|[0-9]{2}\s?[0-9]{2}\s?[0-9]{2})$/;
    var card = document.getElementById('credit-card').value;
    var cardRegex = /^\d{3}([ \-]?)((\d{6}\1?\d{5,10})|(\d{4}\1?\d{4}\1?\d{4}))$/gm;
    if(phonenumber.match(phoneRegex0)||phonenumber.match(phoneRegex1)){
       isPhoneValid=true;
    }
    if(!isPhoneValid){
        alert("phone number format is invalid");

    }

    if(card.match(cardRegex)){
        isCardValid=true;
    }

    if(!isCardValid){
        alert('credit card format is invalid');
    }
    
    if(isCardValid&&isPhoneValid){
        return true;
    }
    return false;
}

setTimeout(start, 10)