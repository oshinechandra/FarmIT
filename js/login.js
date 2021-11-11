function fn1()
{
  var rd1 = document.getElementById("rd1");
  var rd2 = document.getElementById("rd2");

  if(rd1.checked==true)
   alert(rd1.value);
  else if(rd2.checked==true)
   alert(rd2.value);
  else
   alert("Nothing is selected");
}
