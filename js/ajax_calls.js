function show_header(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("agoro_header").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","includes/templates/header.php",true);
  xmlhttp.send();
}