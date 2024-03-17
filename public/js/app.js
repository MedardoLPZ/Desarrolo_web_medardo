document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        input.addEventListener('input', function() {
            const label = this.previousElementSibling;
            if (this.value.trim() === '') {
                label.classList.add('empty');
            } else {
                label.classList.remove('empty');
            }
        });
    });
});
