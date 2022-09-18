const profileImg = document.querySelector('.profile-img')
const fileInput = document.querySelector('#changeImg')
const validateImg = document.querySelector('.validateImg')
const overImg = document.querySelector('.over-img')
const birth = document.querySelector("#birth");
const dangerBtn = document.querySelector('.dangerBtn') ;

//Events 
birth.addEventListener("focus", function () {
  this.type = "date";
});

dangerBtn.addEventListener('click',function(event){
  let option = confirm("Voulez-vous supprimer votre compte ?");
  if(option){
    this.click();
  }else{
    event.preventDefault();
  }
}) ;
fileInput.addEventListener('change',function(e){
  let file = e.target.files[0] 
  let reader = new FileReader() 
  if(file){
      if(file['type'].includes('image')){
      reader.onload = function(){
          let dataURL = this.result
          profileImg.setAttribute('src',dataURL)
      }
      reader.readAsDataURL(file)
      reader.addEventListener('loadend',function(){
          validateImg.classList.remove('hidden')
          validateImg.classList.add('show')

      })
    }else{
        alert('Please Select an image') 
    }
  }
})
