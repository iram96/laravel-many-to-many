
const deleteForms = document.querySelectorAll('.delete-forms');

deleteForms.forEach( form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const confirmation = confirm('Sei sicuro di volere eliminare questo elemento?');
        if(confirmation) e.target.submit();
    });
});


