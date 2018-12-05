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

function show_featured(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("featured").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","includes/templates/featured_products.php",true);
  xmlhttp.send();
}

function show_buy_now(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("payment").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","includes/templates/show_checkout.php",true);
  xmlhttp.send();
}

function show_pay_success(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("payment_success").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","includes/templates/show_payment_success.php",true);
  xmlhttp.send();
}

function show_summary(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("summary").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","../concept-master/panel_summary.php",true);
  xmlhttp.send();
}

function show_brands(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("brands").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","../tables/show_brands.php",true);
  xmlhttp.send();
}

function show_cats(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("cats").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","../tables/show_cats.php",true);
  xmlhttp.send();
}

function show_customers(){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("cust").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","../tables/show_customers.php",true);
  xmlhttp.send();
}
