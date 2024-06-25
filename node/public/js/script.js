function formatDate(dateString) {
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    return new Date(dateString).toLocaleDateString('en-US', options);
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    const dateCells = document.querySelectorAll('.student-table td[data-date]');
    dateCells.forEach(cell => {
      const date = cell.getAttribute('data-date');
      cell.textContent = formatDate(date);
    });
  });
  
