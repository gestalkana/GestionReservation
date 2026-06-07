document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.edit-service-btn').forEach(button => {

        button.addEventListener('click', function () {

            const id = this.dataset.id;
            const nom = this.dataset.nom;
            const description = this.dataset.description;
            const type = this.dataset.type;

            document.getElementById('edit_nom').value = nom ?? '';
            document.getElementById('edit_description').value = description ?? '';
            document.getElementById('edit_type').value = type ?? '';

            document.getElementById('editServiceForm').action =
                `/services/${id}`;
        });

    });

});