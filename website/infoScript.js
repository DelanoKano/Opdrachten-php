function myFunction() {
    let x = document.querySelector("#psw");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 