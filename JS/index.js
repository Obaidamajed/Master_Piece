// Signin & SignUp pages

let btn = document.getElementById('btn');

function motivation() {
  btn.style.opacity = 0.87
  btn.style.transition = '0.8s'
}
function motivation2() {
  btn.style.opacity = 1
}

// Add btn in AdminDashboard

let Add = document.getElementById('Add');

function AddOver() {
  Add.style.color = "green";
  Add.style.fontSize = "1.20em";
  Add.style.transition = "0.8s";
}
function AddOut() {
  Add.style.color = "gray";
  Add.style.fontSize = "1.10em";

}

// Contact Us PublicDashboard 

const message = document.querySelector("#message");
const inc_dec = document.querySelector("#inc_dec");
const charachter = document.getElementById("charachter");

const countCharachters = (str) => {
  return str.trim().length;
}

message.addEventListener("input", () => {
    inc_dec.innerHTML = countCharachters(message.value);
    if (message.value.length > 1) {
      charachter.innerHTML = "Characters";
    } else {
      charachter.innerHTML = "Character"
    }
})

// Add News AdminDashboard 

// const textarea1 = document.querySelector("#textarea1");
// const inc_dec_Add_News = document.querySelector("#inc_dec");
// const charachter_Add_News = document.getElementById("charachter");

// const countCharachtersAddNews = (str) => {
//   return str.trim().length;
// }

// textarea1.addEventListener("input", () => {
//   inc_dec_Add_News.innerHTML = countCharachtersAddNews(textarea1.value);
//     if (textarea1.value.length > 1) {
//       charachter_Add_News.innerHTML = "Characters";
//     } else {
//       charachter_Add_News.innerHTML = "Character"
//     }
// })

