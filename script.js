// Funzione per mostrare i form
function showForm(formId) {
    // Rimuovi la classe "active" da tutti i form
    document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
    
    // Aggiungi la classe "active" solo al form che viene selezionato
    document.getElementById(formId).classList.add("active");
}
