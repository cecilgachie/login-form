
const darkModeToggle = document.getElementById('dark-mode-toggle');


if (localStorage.getItem('dark-mode') === 'enabled') {
    document.body.classList.add('dark-mode');
    darkModeToggle.checked = true; 
} else {
    document.body.classList.remove('dark-mode');
    darkModeToggle.checked = false; 
}


darkModeToggle.addEventListener('change', () => {
    if (darkModeToggle.checked) {
        
        document.body.classList.add('dark-mode');
        localStorage.setItem('dark-mode', 'enabled'); 
    } else {
        
        document.body.classList.remove('dark-mode');
        localStorage.setItem('dark-mode', 'disabled'); 
    }
});
