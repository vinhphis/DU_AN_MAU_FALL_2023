var album=[];
for(var i=1;i<7;i++){
    album[i]=new Image();
    album[i].src="./img/anhbanner ("+i+").jpg";
}
 var interval=setInterval(slideshow,1500);
index=0;
function slideshow(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
   
    
}
function next(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
   
}
function pre(){
    index--;
    if(index<0){
        index=4;
    }
    document.getElementById("banner").src=album[index].src;
   
}
// xử lý hiện thị mật khẩu
function togglePassword() {
    var passwordInput = document.getElementById("password");
    var hien = document.getElementById("hien");
    var an = document.getElementById("an");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        hien.style.display = "block";
        an.style.display = "none";
    } else {
        passwordInput.type = "password";
        an.style.display = "block";
        hien.style.display = "none";
    }
}
// sử lý ô input số lượng
function decreaseQuantity(input) {
    var value = parseInt(input.value);
    if (value > 1) {
      input.value = value - 1;
  
    }
  }
  
  function increaseQuantity(input) {
    var value = parseInt(input.value);
    input.value = value + 1;
  
  }
  // xử lý chọn tất cả và bỏ chọn tất cả các ô input
  function selectAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Đặt thuộc tính checked của tất cả các checkbox thành true
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = true;
    });
}

function deleteAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
// Đặt thuộc tính checked của tất cả các checkbox thành false
checkboxes.forEach(function(checkbox) {
    checkbox.checked = false;
});
}