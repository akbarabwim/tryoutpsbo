$(function(){
  //untuk registrasi peserta
  $("#regsubmit").click(function(){
    var name        = $("#name").val();
    var username    = $("#username").val();
    var password    = $("#password").val();
    var email       = $("#email").val();
    var dataString  = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
      $.ajax({
        type:"POST",
        url:"getregister.php",
        data:dataString,
        success:function(data){
          $("#state").html(data);
        }
      });
      return false;
  });

  $("#loginsubmit").click(function(){
    var username    = $("#username").val();
    var password    = $("#password").val();
    var dataString  = 'username='+username+'&password='+password;
      $.ajax({
        type:"POST",
        url:"getlogin.php",
        data:dataString,
        success: function(data){
          if ($.trim(data) == "empty") {
            $(".empty").show();
          }else if ($.trim(data)=="error") {
            $(".error").show();
          }else{
            window.location = "exam.php";
          }
        }
      });
      return false;
  });
});
