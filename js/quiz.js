const questions = document.querySelectorAll(".group");
const button = document.querySelector("button");
let counter = 0;

const show = () => questions[counter].style.display = "block";

function next() {
    if(counter == 3) { // if last question
        button.textContent = "Bitir";
        button.type = "submit";
    }
    questions[counter].style.display = "none";
    counter++;
    show();
}

window.onload = show();