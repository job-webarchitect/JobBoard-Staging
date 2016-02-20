$("form#uploadresume").submit(function(){
    // $("#full_loader").fadeIn('900');
    myfile= $("#res1-file").val();
    var ext = myfile.split('.').pop();
    if(ext=="pdf" || ext=="docx" || ext=="doc"){
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: base_url+'/seekerprofile/upload_files',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                var data = JSON.parse(data);
                if(data['status'] == 'success'){
                    console.log('true');
                    $("#resume_id").html(data['file_name']);
                    $("#old_file_name").val(data['file_name']);
                    // $("#full_loader").fadeOut('900');
                    show_status('res1-detail','res1', 'res1-edit');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
    return false;
});

function getUrlParameter(sParam) {
      var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
}