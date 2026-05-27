function getFile() {
	var formData = new FormData();
	formData.append('file', $('#file')[0].files[0]);

	console.log($('#file').prop("files"));

	$.ajax({
		url : './convertFile.php',
		type : 'POST',
		data : formData,
		processData: false,  // tell jQuery not to process the data
		contentType: false,  // tell jQuery not to set contentType
		success : function(response) {
			console.log(response);
		}
	});
}