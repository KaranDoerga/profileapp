//script.js


// Project gegevens in de modal zetten
document.addEventListener('DOMContentLoaded', () => {
    // Haal de data van de script tag
    const projectData = JSON.parse(document.getElementById('project-data').textContent);

    // Elementen voor de modal
    const modal = document.getElementById('project-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalDescription = document.getElementById('modal-description');
    const modalCategory = document.getElementById('modal-language');
    const closeModalButton = document.getElementById('close-modal')

    const detailButtons = document.querySelectorAll('.view-details')
    detailButtons.forEach(button => {
        button.addEventListener('click', () => {
            const projectId = parseInt(button.getAttribute('data-id'));
            const project = projectData.find(p => p.id === projectId);
            console.log('Data ID van de knop:', projectId);
            console.log('ID-waarden in projectData:', projectData.map(p => p.id));

            if (project) {
                // Vul de modal met de projectgegevens
                modalTitle.textContent = project.title;
                modalDescription.textContent = project.beschrijving;
                modalCategory.textContent = project.category;

                modal.style.display = 'flex';
            }
        })
    })

    // Sluit modal wanneer op de sluitknop wordt geklikt
    closeModalButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Sluit modal wanneer er buiten het venster wordt geklikt
    window.addEventListener('click', () => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    })

//Open en sluit de add-project-modal
    document.getElementById('open-add-project-modal').addEventListener('click', function () {
        document.getElementById('add-project-modal').style.display = 'flex';
    });

    document.getElementById('close-add-project').addEventListener('click', function () {
        document.getElementById('add-project-modal').style.display = 'none';
    })
});

function toggleMenu() {
    const nav = document.querySelector("nav ul");
    nav.classList.toggle("active");
}