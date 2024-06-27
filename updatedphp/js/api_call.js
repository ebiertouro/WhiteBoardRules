function downloadPDF() {
    // 'deactivate' button
    $('#downloadBtn').html("downloading...");
    $('#downloadBtn').css("background-color", "lightgray");

    // get values
    var student_id = $('input[name="student_id"]').val();
    var student_name = $('input[name="student_name"]').val();
    var teacher_name = $('input[name="teacher_name"]').val();
    var school_name = $('input[name="school_name"]').val();
    var grade_level = $('input[name="grade_level"]').val();
    var grades = "["
    $(".student-table-row").each(function (i) {
        if (i != 0) grades += ",";
        grades += "{"
        grades += '"subject" : "' + $(this).find('.subject_name').text() + '",';
        grades += '"grade" : "' + $(this).find('.average_grade').text() + '",';
        grades += '"comment" : "' + $(this).find('.comment-cell').text() + '"}';
    });
    grades += "]";

    var dataString = '{"teacherName":"' + teacher_name + '","schoolName":"' + school_name + '","gradeLevel":"' + grade_level + '","student":{"name":"' + student_name + '","id":"' + student_id + '","grades":' + grades + '}}';
    const settings = {
        async: true,
        crossDomain: true,
        url: 'https://apitemplate1.p.rapidapi.com/v2/create-pdf?template_id=b3f77b23493320da&async=0&output_html=0&output_format=pdf&export_type=json&webhook_url=https%3A%2F%2Fyourwebserver.com',
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-API-KEY': '89f6MTg3OTc6MTU4OTY6QW90MFFHQVBnbkduYmpNMw=',
            'X-RapidAPI-Key': '70e0c7656cmsh6e2aa52f1e144b4p1941d6jsn3f007f567435',
            'X-RapidAPI-Host': 'apitemplate1.p.rapidapi.com'
        },
        processData: false,
        data: dataString
        };

    $.ajax(settings).done(function (response) {
        //console.log(response.download_url);
        window.open(response.download_url);
        // un'deactivate' button
        $('#downloadBtn').html("Generate Again");
        $('#downloadBtn').css("background-color", "#5EFC8D");
    });
}
