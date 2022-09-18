const birth = document.querySelector("#birth");
const btn = document.querySelector('.btn') ;


//Events
birth.addEventListener("focus", function () {
  this.type = "date";
});


