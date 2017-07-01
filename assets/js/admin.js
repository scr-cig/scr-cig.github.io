$(document).ready(function(){

      $('.LoginResult').click(function(){

            var RLoginID = "Ajax.php?act=Login&Result_ID="+$(this).attr("value");
            
            function LoginResult() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("errr").innerHTML =
                  this.responseText;
                }
              };
              xhttp.open("GET", RLoginID, true);
              xhttp.send();
            }
            LoginResult();
      });
      $('.CardResult').click(function(){

            var RLoginID = "Ajax.php?act=Cc&Cc_ID="+$(this).attr("value");
            
            function CcResult() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("errr").innerHTML =
                  this.responseText;
                }
              };
              xhttp.open("GET", RLoginID, true);
              xhttp.send();
            }
            CcResult();
      });

      $('.PPL_Identity_ID').click(function(){

            var RLoginID = "Ajax.php?act=Identity&Pic_ID="+$(this).attr("tnaket");
            
            function IdentityResult() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("errr").innerHTML =
                  this.responseText;
                }
              };
              xhttp.open("GET", RLoginID, true);
              xhttp.send();
            }
            IdentityResult();
      });
        
    $('.EndResultBox').click(function(){
        $('#errr').hide();
    });

});