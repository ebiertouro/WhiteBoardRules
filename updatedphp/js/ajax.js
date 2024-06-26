function fetchAssignments(subjectId) {
    const assignmentSelect = document.getElementById('assignmentSelect');
    const assignmentDiv = document.getElementById('assignmentDiv');

    if (subjectId) {
        // Clear previous options
        assignmentSelect.innerHTML = "<option value=''>Loading...</option>";
        assignmentSelect.disabled = true;

        // Fetch assignments via AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `get_assignments.php?subject_id=${subjectId}`, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const assignments = JSON.parse(xhr.responseText);

                // Populate assignments dropdown
                assignmentSelect.innerHTML = "<option value=''>Select an Assignment</option>";
                assignments.forEach(assignment => {
                    assignmentSelect.innerHTML += `<option value='${assignment.assignment_id}'>${assignment.assignment_name}</option>`;
                });

                assignmentSelect.disabled = false;
                assignmentDiv.style.display = 'block';
            } else {
                assignmentSelect.innerHTML = "<option value=''>Failed to load assignments</option>";
            }
        };

        xhr.send();
    } else {
        assignmentSelect.innerHTML = "<option value=''>Select a Subject First</option>";
        assignmentSelect.disabled = true;
        assignmentDiv.style.display = 'none';
    }
}