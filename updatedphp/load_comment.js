$(document).ready(function() {
    console.log('Document ready');
    
    $('.snark-level-select').change(function() {
        console.log('Snark level changed');
        
        var $row = $(this).closest('tr');
        var subject_id = $row.data('subject-id');
        var letter_grade = $row.data('letter-grade');
        var snark_level = $(this).val();
        
        console.log('Subject ID:', subject_id);
        console.log('Snark Level:', snark_level);
        console.log('Letter Grade:', letter_grade);

        if (!letter_grade) {
            // Remove console.error for undefined letter_grade
            return; // Exit the function if letter_grade is undefined
        }

        $.ajax({
            url: 'fetch_comments.php',
            type: 'POST',
            dataType: 'json',
            data: {
                subject_id: subject_id,
                snark_level: snark_level,
                letter_grade: letter_grade
            },
            success: function(response) {
                console.log('AJAX Success. Response:', response);
                if (response && response.comment) {
                    $('.comment-cell[data-subject-id="' + subject_id + '"]').text(response.comment);
                } else {
                    console.error('Invalid response format or missing comment'); // Keeping error for response issues
                }
            },
            error: function(xhr, status, error) {
                // Remove console.error for AJAX errors
                console.log('XHR:', xhr.responseText);
            }
        });
    });
});
