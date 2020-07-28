$(document).ready(function () {
   $('.add').click(function (e) {
      e.preventDefault();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
      });
      var name = $("#name").val();
      var email = $("#email").val();
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
      var role = $("#role").val();
      var password = $("#password").val();
      if (name == "") {
         $(".name").text("Please enter name");
         $(".name").css("color", "red");
         $(".email").text("");
         $(".role").text("");
         $(".password").text("");

      }

      else if (email == "") {
         $(".name").text("");
         $(".email").text("Please enter email");
         $(".email").css("color", "red");
         $(".role").text("");
         $(".password").text("");

      }
      else if (!emailRegex.test(email)) {
         $(".email").show();
         $(".email").text("Please enter valid Email");
         $(".email").css("color", "red");
      }
      else if (role == "") {
         $(".name").text("");
         $(".email").text("");
         $(".role").text("Please enter role");
         $(".role").css("color", "red");
         $(".password").text("");

      }
      else if (password == "") {
         $(".name").text("");
         $(".email").text("");
         $(".role").text("");
         $(".password").text("Please enter Password");
         $(".password").css("color", "red");

      }
      else {
         $(".name").text("");
         $(".email").text("");
         $(".role").text("");
         $(".password").text("");

         $.ajax({
            url: "/form/post",
            method: 'post',
            data: {

               name: $('#name').val(),
               email: $('#email').val(),
               role: $('#role').val(),
               password: $('#password').val()
            },
            success: function (result) {
               window.location = "list";
               $(".alert").show();
            }
         });
      }
   });
});


$(document).ready(function () {
   $('.edit').click(function (e) {
      e.preventDefault();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
      });
      var name = $(".editname").val();
      var email = $(".editemail").val();
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
      var role = $(".editrole").val();
      var password = $(".editpassword").val();
      var id = $(".userid").val();
      if (name == "") {
         $(".name").text("Please enter name");
         $(".name").css("color", "red");
         $(".email").text("");
         $(".role").text("");
         $(".password").text("");

      }

      else if (email == "") {
         $(".name").text("");
         $(".email").text("Please enter email");
         $(".email").css("color", "red");
         $(".role").text("");
         $(".password").text("");

      }
      else if (!emailRegex.test(email)) {
         $(".email").show();
         $(".email").text("Please enter valid Email");
         $(".email").css("color", "red");
      }
      else if (role == "") {
         $(".name").text("");
         $(".email").text("");
         $(".role").text("Please enter role");
         $(".role").css("color", "red");
         $(".password").text("");

      }
      else if (password == "") {
         $(".name").text("");
         $(".email").text("");
         $(".role").text("");
         $(".password").text("Please enter Password");
         $(".password").css("color", "red");

      }
      else {
         $(".name").text("");
         $(".email").text("");
         $(".role").text("");
         $(".password").text("");
         $.ajax({
            url: "/edit/form/",
            TYPE: 'GET',
            data: { 
               id:id,
               editname: name,
               email: email,
               role:role,
               password: password
            },
            success: function (result) {
               if($.trim(result)=="done")
               {
                  window.location = "/admin/list";
                  $(".alert").show();
               }
               else{
                  alert("something went wrong");
               }
            }
         });
      }
   });
});


$(document).ready(function () {
   $('.reviewedit').click(function (e) {
      e.preventDefault();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
      });
      var status_id = $(".reviewerstatus_id").val();
      var comment = $(".reviewercomment").val();
      var id = $(".reviewerid").val();
      if (comment == "") {
         $(".status_id").text("");
         $(".comment").text("Please enter your comments");
         $(".comment").css("color", "red");
      }
      else {
         $(".comment").text("");
         $.ajax({
            url: "/edit/reviewer/",
            TYPE: 'GET',
            data: { 
               id:id,
               status_id: status_id,
               editcomment: comment
            },
            success: function (result) {
               if($.trim(result)=="done")
               {
                  window.location = "/reviewer/list";
                  $(".alert").show();
               }
            }
         });
      }
   });
});


$(document).ready(function () {
   $('.cardd').click(function (e) {
      e.preventDefault();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
      });
      var name = $(".cardname").val();
      var address = $(".cardaddress").val();
      var number = $(".cardnumber").val();
      var month = $(".cardmonth").val();
      var year = $(".cardyear").val();
      var cardname = $(".cardnamecard").val();
      var cvv = $(".cardcvv").val();
      if (name == "") {
         $(".name").text("Please enter name");
         $(".name").css("color", "red");
         $(".address").text("");
         $(".number").text("");
         $(".cvv").text("");
         $(".year").text("");
         $(".cardname").text("");
         $(".month").text("");

      }

      else if (address == "") {
         $(".name").text("");
         $(".address").text("Please enter email");
         $(".address").css("color", "red");
         $(".number").text("");
         $(".cvv").text("");
         $(".year").text("");
         $(".cardname").text("");
         $(".month").text("");

      }
      else if (number == "") {
         $(".name").text("");
         $(".address").text("");
         $(".number").text("Please enter number");
         $(".number").css("color", "red");
         $(".cvv").text("");
         $(".year").text("");
         $(".cardname").text("");
         $(".month").text("");

      }
      else if (month == "") {
         $(".name").text("");
         $(".address").text("");
         $(".number").text("");
         $(".month").text("Please enter month");
         $(".month").css("color", "red");
         $(".cvv").text("");
         $(".year").text("");
         $(".cardname").text("");

      }
      else if (year == "") {
         $(".name").text("");
         $(".address").text("");
         $(".number").text("");
         $(".year").text("Please enter year");
         $(".year").css("color", "red");
         $(".cvv").text("");
         $(".month").text("");
         $(".cardname").text("");

      }
      else if (cvv == "") {
         $(".name").text("");
         $(".address").text("");
         $(".number").text("");
         $(".cvv").text("Please enter cvv");
         $(".cvv").css("color", "red");
         $(".year").text("");
         $(".month").text("");
         $(".cardname").text("");

      }
      else if (cardname == "") {
         $(".name").text("");
         $(".address").text("");
         $(".number").text("");
         $(".cardname").text("Please enter card name");
         $(".cardname").css("color", "red");
         $(".year").text("");
         $(".month").text("");
         $(".cvv").text("");

      }
      else {
         $(".name").text("");
         $(".address").text("");
         $(".number").text("");
         $(".cardname").text("");
         $(".year").text("");
         $(".month").text("");
         $(".cvv").text("");

         $.ajax({
            url: "/form/buynow",
            method: 'post',
            data: {

            },
            success: function (result) {
               if($.trim(result)=="done"){

                  window.location = "/customer/finalproduct";
               }

            }
         });
      }
   });
});







