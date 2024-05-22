document.addEventListener('DOMContentLoaded', function() {
    var addTextboxBtn = document.getElementById('addTextboxBtn');
    var textboxContainer = document.getElementById('textboxContainer');

    addTextboxBtn.addEventListener('click', function() {
        var textbox = document.createElement('input');
        textbox.setAttribute('type', 'text');
        textbox.classList.add('textbox');
        textboxContainer.appendChild(textbox);
    });
});
