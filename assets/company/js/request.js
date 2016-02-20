$("#companyForm").submit(function(){
	$("#full_loader").fadeIn('900');
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: base_url+'/jsonapi/save_companystartup',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
        	$("#full_loader").fadeOut('900');
            var data = JSON.parse(data);
            console.log(data);
            if(data['status'] == 'success'){
            	window.location.href = base_url + '/employer';
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});
