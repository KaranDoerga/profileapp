//script.js

//Open en sluit de modals
document.getElementById('open-add-project-modal').addEventListener('click', function () {
    document.getElementById('add-project-modal').style.display = 'flex';
});

document.getElementById('close-add-project').addEventListener('click', function () {
    document.getElementById('add-project-modal').style.display = 'none';
})

//Voor project details
document.querySelector('.view-details-btn').forEach(function (button) {
    button.addEventListener('click', function () {
        const projectId = this.getAttribute('data-project-id');
        const projectData = JSON.parse(document.getElementById('project-data').textContent)[projectId];

        //Debugging - print projectData om te zien of image aanwezig is
        console.log(projectData);

        //Vul modal met projectgegevens
        document.getElementById('modal-title').innerText = projectData.title;
        document.getElementById('modal-description').innerText = projectData.description;

        //Controleer of projectData een image heeft
        if (projectData.image) {
            document.getElementById('modal-image').src = projectData.image;
        } else {
            console.log("Afbeelding niet gevonden voor project", projectId);
            document.getElementById('modal-image').src = "public/images/no-image.jpg";
        }

        //Toon de modal
        document.getElementById('project-detail-modal').style.display = 'flex';
    })
})

document.getElementById('close-project-detail').addEventListener('click', function () {
    document.getElementById('project-detail-modal').style.display = 'none';
})