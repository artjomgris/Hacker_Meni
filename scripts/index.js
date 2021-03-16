$(document).ready(function (){
   $("#main").hide();
   $("#header").hide();
   $("#header").slideDown("slow");
   $("#startbut").click(function () {
      $("#main").slideDown("slow");
   });
});