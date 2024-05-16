document.addEventListener('DOMContentLoaded', function() {
    var is_group = document.getElementById('is_group');
    var is_route_link = document.getElementById('is_route_link');
    var is_route_link_div = document.getElementById('is_route_link_div');
    var backoffice_color = document.getElementById('backoffice_color_div');
    var link_div = document.getElementById('link_div');
    var belongstogroup = document.getElementById('belongstogroup');

    is_group.addEventListener('change', function() {
        if (this.checked) {
            backoffice_color.classList.remove('hidden');
            link_div.classList.add('hidden');
            is_route_link_div.classList.add('hidden');
        } else {
            backoffice_color.classList.add('hidden');
            link_div.classList.remove('hidden');
            is_route_link_div.classList.remove('hidden');
        }
    });

    is_route_link.addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('link').placeholder = 'admin.menu.index';
        } else {
            document.getElementById('link').placeholder = '/#accueil';
        }
    });

    belongstogroup.addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('group_id_div').classList.remove('hidden');
        } else {
            document.getElementById('group_id_div').classList.add('hidden');
        }
    });


    const labels = document.querySelectorAll('#group_id_div label');
    labels.forEach(label => {
        const input = label.querySelector('input[type="radio"]');
        const span = document.getElementById('group_' + input.value + '_name');

        input.addEventListener('click', function() {
            // Si l'input est coché
            if (this.checked) {
                // Parcourir tous les autres labels pour décocher les inputs et supprimer les classes
                labels.forEach(otherLabel => {
                    if (otherLabel !== label) {
                        const otherInput = otherLabel.querySelector('input[type="radio"]');
                        otherInput.checked = false;
                        otherLabel.classList.remove('z-10', 'border-indigo-200', 'bg-indigo-50');
                        otherLabel.classList.add('border-gray-200');
                        const otherSpan = document.getElementById('group_' + otherInput.value + '_name');
                        otherSpan.classList.remove('text-indigo-900');
                        otherSpan.classList.add('text-gray-900');
                    }
                });

                // Ajouter les classes à l'input actuel
                label.classList.remove('border-gray-200')
                label.classList.add('z-10', 'border-indigo-200', 'bg-indigo-50');
                span.classList.remove('text-gray-900');
                span.classList.add('text-indigo-900');
            } else {
                // Si l'input est décoché, supprimer les classes
                label.classList.add('border-gray-200')
                label.classList.remove('z-10', 'border-indigo-200', 'bg-indigo-50');
                span.classList.add('text-gray-900');
                span.classList.remove('text-indigo-900');
            }
        });
    });

});
