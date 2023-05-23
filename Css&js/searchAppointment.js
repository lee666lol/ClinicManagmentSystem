/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


//$(document).ready(function() {
//    var name = $('#search').val();
//    $("#search").keyup(function() {
//        $.ajax({
//               //AJAX type is "Post".
//               type: "POST",
//               //Data will be sent to "ajax.php".
//               url: "searchAppointment.php",
//               //Data, that will be sent to "ajax.php".
//               data: {
//                   //Assigning value of "name" into "search" variable.
//                   search: name
//               },
//               //If result found, this funtion will be called.
//               success: function(html) {
//                   //Assigning result to "display" div in "search.php" file.
//                   $("#display").html(html).show();
//               }
//           });
//    });
//});

$(document).ready(function() {
    var search = $("#search").val();
    $('#search').on('input', function() {
        search = $("#search").val();
        
        if (search == "") {
            $("#allRecord").show();
            $("#pagination").show();
            $("#display").hide();
            return;
        }
        
        $.ajax({
            url: 'searchAppointment1.php',
            type: 'POST',
            data: {
                name: search
            },
            success: function(response) {
                $("#allRecord").hide();
                $("#pagination").hide();
                $("#display").html(response).show();
                
            },
            error: function() {
                // handle error response
            }
        });
    });
});