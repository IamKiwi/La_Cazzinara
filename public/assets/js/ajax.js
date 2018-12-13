$(document).ready(function(){

    var url = "/admin/feedbacks";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data.id);
            $('#message').text(data.message);

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new task
    $('#btn-close').click(function(){
        $('#frm').trigger("reset");
        $('#myModal').modal('hide');
    });
});