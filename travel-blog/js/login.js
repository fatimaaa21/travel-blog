function myLogPassword() {
  var a = document.getElementById('logPassword');
  var b = document.getElementById('eye');
  var c = document.getElementById('eye-slash');

  if(a.type === "password") {
    a.type = "text"
    b.style.opacity = "1";
    c.style.opacity = "0";
  }else {
    a.type = "password"
    b.style.opacity = "0";
    c.style.opacity = "1";
  }
}

function myRegPassword() {
  var d = document.getElementById('regPassword');
  var b = document.getElementById('eye-2');
  var c = document.getElementById('eye-slash-2');

  if(d.type === "password") {
    d.type = "text"
    b.style.opacity = "1";
    c.style.opacity = "0";
  }else {
    d.type = "password"
    b.style.opacity = "0";
    c.style.opacity = "1";
  }
}