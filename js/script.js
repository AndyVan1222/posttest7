let nama = prompt("What is your name sir?")
alert("Hello "+ nama + "!")


function check()
{
    let cb = document.getElementById('cb').checked;
    if(cb == true)
    {
        document.getElementById('head').classList.remove('header');
        document.getElementById('head').classList.add('headerDark')
        document.getElementById('container').classList.remove('contain');
        document.getElementById('container').classList.add('containDarkmode');
        document.getElementById('footer').classList.remove('foot');
        document.getElementById('footer').classList.add('footDark');
    }

    else
    {
        document.getElementById('head').classList.remove('headerDark');
        document.getElementById('head').classList.add('header');
        document.getElementById('container').classList.remove('containDarkmode');
        document.getElementById('container').classList.add('contain');
        document.getElementById('footer').classList.remove('footDark');
        document.getElementById('footer').classList.add('foot');
    }
}

let button = document.getElementById('buttonInfo');
button.addEventListener("click", function(){
let x = document.getElementById("more");
if(x.style.display == "none")
{
    x.style.display = "block";
}

else
{
    x.style.display = "none";
}
})

