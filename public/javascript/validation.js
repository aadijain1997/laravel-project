function checkform() {
   var valid1 = validateContact();
   if (valid1) {
      $(document).on('click', '.add', function (e) {
         var data = $(".formadd").serialize();
         $.ajax({
            url: "/form/post",
            method: 'post',
            data: data,
            success: function (result) {
               window.location = "list";
               $(".alert").show();
            }
         });
      });

   }
}
//validation for add user
function validateContact() {
   var valid = true;
   if (!$("#name").val()) {
      $(".name").show();
      $(".name").html("please enter the name");
      $(".name").css("color", "red");
      $("#name").css("border-color", "red");
      $(".addname").keyup(function () {
         $(".name").hide();
         $("#name").css("border-color", "green");
      });
      valid = false;
   }

   if (!$("#role").val()) {
      $(".role").show();
      $(".role").html("please enter the role");
      $(".role").css("color", "red");
      $("#role").css("border-color", "red");
      $(".addrole").keyup(function () {
         $(".role").hide();
         $("#role").css("border-color", "green");
      });
      valid = false;
   }


   if (!$("#email").val()) {
      $(".email").show();
      $(".email").html("please enter email");
      $(".email").css("color", "red");
      $("#email").css("border-color", "red");
      $(".addemail").keyup(function () {
         $(".email").hide();
         $("#email").css("border-color", "green");
      });
      valid = false;
   }


   if (!$("#password").val()) {
      $(".password").show();
      $(".password").html("please enter password");
      $(".password").css("color", "red");
      $("#password").css("border-color", "red");
      $(".addpass").keyup(function () {
         $(".password").hide();
         $("#password").css("border-color", "green");
      });
      valid = false;
   }


   if ($("#email").val()) {
      var x = $("#email").val();
      var atposition = x.indexOf("@");
      var dotposition = x.lastIndexOf(".");
      if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
         $(".email").show();
         $(".email").html("Invalid email");
         $(".email").css("color", "red");
         $("#email").css("border-color", "red");
         return false;
      }
   }
   return valid;
}

//edit user

function editform() {
   var valid1 = validateedit();
   if (valid1) {
      $(document).on('click', '.edit', function (e) {
         $.ajax({
            url: "/edit/form",
            TYPE: 'GET',
            data: {
               id: $(".userid").val(),
               editname: $("#name").val(),
               email: $("#email").val(),
               role: $("#role").val(),
               password: $("#password").val()
            },
            success: function (result) {
               if ($.trim(result) == "done") {
                  window.location = "/admin/list";
                  $(".alert").show();
               }
               else {
                  alert("something went wrong");
               }
            }
         });
      });

   }
}
//validation for add user
function validateedit() {
   var valid = true;
   if (!$("#name").val()) {
      $(".name").show();
      $(".name").html("please enter the name");
      $(".name").css("color", "red");
      $("#name").css("border-color", "red");
      $(".editname").keyup(function () {
         $(".name").hide();
         $("#name").css("border-color", "green");
      });
      valid = false;
   }
   if (!$(".userid").val()) {
      valid = false;
   }

   if (!$("#email").val()) {
      $(".email").show();
      $(".email").html("please enter email");
      $(".email").css("color", "red");
      $("#email").css("border-color", "red");
      $(".editemail").keyup(function () {
         $(".email").hide();
         $("#email").css("border-color", "green");
      });
      valid = false;
   }


   if (!$("#password").val()) {
      $(".password").show();
      $(".password").html("please enter password");
      $(".password").css("color", "red");
      $("#password").css("border-color", "red");
      $(".editpass").keyup(function () {
         $(".password").hide();
         $("#password").css("border-color", "green");
      });
      valid = false;
   }


   if ($("#email").val()) {
      var x = $("#email").val();
      var atposition = x.indexOf("@");
      var dotposition = x.lastIndexOf(".");
      if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
         $(".email").show();
         $(".email").html("Invalid email");
         $(".email").css("color", "red");
         $("#email").css("border-color", "red");
         return false;
      }
   }
   return valid;
}

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
               id: id,
               status_id: status_id,
               editcomment: comment
            },
            success: function (result) {
               if ($.trim(result) == "done") {
                  window.location = "/reviewer/list";
                  $(".alert").show();
               }
            }
         });
      }
   });
});

function buy() {
   var valid1 = validatefinal();
   if (valid1) {
      $(document).on('click', '.cardd', function (e) {
         e.preventDefault();
               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
               });
         // var data = $(".formadd").serialize();
         $.ajax({
            url: "/form/buynow",
            method: 'post',
            data: {

            },
            success: function (result) {
               if ($.trim(result) == "done") {
                   window.location = "/customer/finalproduct";
               }

            }
         });
      });

   }
}
//validation for add user
function validatefinal() {
   var valid = true;
   if (!$(".cardname").val()) {
      $(".name").show();
      $(".name").html("please enter the name");
      $(".name").css("color", "red");
      $(".cardname").css("border-color", "red");
      $(".buyname").keyup(function () {
         $(".name").hide();
         $(".cardname").css("border-color", "green");
      });
      valid = false;
   }

   if (!$(".cardaddress").val()) {
      $(".address").show();
      $(".address").html("please enter the address");
      $(".address").css("color", "red");
      $(".cardaddress").css("border-color", "red");
      $(".buyadd").keyup(function () {
         $(".address").hide();
         $(".cardaddress").css("border-color", "green");
      });
      valid = false;
   }


   if (!$(".cardnumber").val()) {
      $(".number").show();
      $(".number").html("please enter card-number");
      $(".number").css("color", "red");
      $(".cardnumber").css("border-color", "red");
      $(".buycard").keyup(function () {
         $(".number").hide();
         $(".cardnumber").css("border-color", "green");
      });
      valid = false;
   }

   if (!$(".cardcvv").val()) {
      $(".cvv").show();
      $(".cvv").html("required");
      $(".cvv").css("color", "red");
      $(".cardcvv").css("border-color", "red");
      $(".buycvv").keyup(function () {
         $(".cvv").hide();
         $(".cardcvv").css("border-color", "green");
      });
      valid = false;
   }

   if ($(".cardcvv").val().length > 3 || $(".cardcvv").val().length < 3) {
      $(".cvv").show();
      $(".cvv").html("Should be 3");
      $(".cvv").css("color", "red");
      $(".cardcvv").css("border-color", "red");
      $(".buycvv").keyup(function () {
         $(".cvv").hide();
         $(".cardcvv").css("border-color", "green");
      });
      valid = false;
   }


   if (!$(".cardnamecard").val()) {
      $(".carddname").show();
      $(".carddname").html("please enter card-holder-name");
      $(".carddname").css("color", "red");
      $(".cardnamecard").css("border-color", "red");
      $(".buycardd").keyup(function () {
         $(".carddname").hide();
         $(".cardnamecard").css("border-color", "green");
      });
      valid = false;
   }
   return valid;
}

$(document).ready(function () {
   $('select').selectpicker();
});











