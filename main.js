 $(document).ready(function () {
        $.get("get.php", function (data) {
            var array_res = JSON.parse(data);
            var buffer = create_buffer(array_res);
            $("#data").html(buffer);
        });
        $('.add').click(function (e) {
            $(window).attr('location', 'formUser.php');

        });
        $(document).on("click", ".tr_user", function () {
            var id = $(this).find('td:eq(0)').text();

            $(window).attr('location', 'formUser.php?g=' + id);
        });
         $('.back').click(function (e) {
         $(window).attr('location', 'index.php');
           
    });
    $("input").keyup(function () {

    if ($(this).val() !== "") {
        $(this).closest('.form-group').find('small').fadeOut();
    }});
    $('.delete_row').click(function (e) {
     var  confirmAction = confirm("Are you sure to execute this action? (delete)");
        if (confirmAction) {
           var id= $('#type').attr('data-id');
              var  data = "user_ID="+ id;
                var myUrl='delete.php';
            
                $.ajax({
                        type: 'POST',
                        url: myUrl,
                        data:  data,
                        success: function (response)
                        {
                            console.log(response)

                            $(window).attr('location', 'index.php');
                        }
                    });
                }
       
    });
    $('.record').click(function (e) {
   
    $('.help-block ').hide();

    var regfr = new RegExp("^0[1-9]([-. ]?[0-9]{8})$");

    if ($("#first_name").val() === "" )
    {
      $('#error-firstname').fadeIn();
   }
    if ($("#last_name").val() === "" )
    {
     $('#error-lastname').fadeIn();
        $('#error-lastname').css('display','block');}
    
    if ($("#phone").val() === "" )
    {   $('#error-tel').fadeIn();
        $('#error-tel').css('display','block')
     }
    else if (regfr.test($("#phone").val()) == false) {
        $("#phone").css('border-color', '#CF0A1D');
        $('#error-tel').fadeIn();
        $('#error-tel').css('display','block');
    }
    if ($("#first_name").val() !== "" && $("#last_name").val() !== ""  && $("#phone").val() !== "" 
            && (regfr.test($("#phone").val()) == true) ) {
        var  confirmAction = confirm("Are you sure to execute this action? ("+$('#type').text()+")");
        if (confirmAction) {

         var data = $("#idForm").serialize();
           if($('#type').text()=='Edit'){
                var id= $('#type').attr('data-id');
                data += "&user_ID="+ id;
                var myUrl='edit.php';
            }
                else{
                     var myUrl='add.php'
                }
                $.ajax({
                        type: 'POST',
                        url: myUrl,
                        data:  data,
                        success: function (response)
                        {
                            console.log(response)
                           if (response.split("||")[1]=='success'){
                            $(window).attr('location', 'index.php');
                        }
                        else{
                        alert(response.split("||")[1]);
                    }
                        }
                    });
                }
            }
    });
    
    });
    function create_buffer(array_res) {
        var buffer = '';
        $.each(array_res, function (key, resD) {
            buffer += `<tr class="tr_user" style="cursor:pointer"><td>${resD.user_ID}</td><td>`
            buffer += `${resD.user_first_name} </td><td>${resD.user_last_name}</td><td>${resD.user_age}</td>
                      <td>${resD.user_phone} </td></tr>`;
        });
        return buffer;
    }

