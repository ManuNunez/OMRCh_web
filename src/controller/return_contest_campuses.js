import { handleFormSubmit, checkCCT } from "./register_student_in_contest.js";

document.addEventListener('DOMContentLoaded', async () => {

    const fetchContestCampuses = async () => {
        try {
            const response = await fetch('../backend/services/return_contest_campuses.php');

            // Asignar funciones a eventos sin usar window
            const data = await response.json();  
            // console.log(data);
            

            if (data.status === '1') {
                return data.data.reduce((acc, campus) => {
                    if (!acc[campus.contest_id]) {
                        acc[campus.contest_id] = [];
                    }
                    acc[campus.contest_id].push(campus);
                    return acc;
                }, {});
            } else {
                console.error('Error fetching contest campuses:', data.error);
                return {};
            }
        } catch (error) {
            console.error('Error fetching contest campuses:', error);
            return {};
        }
    }

    function openModal(contestId, contestIdToCampuses, modal, campusSelect) {
        campusSelect.innerHTML = '';
        const campuses = contestIdToCampuses[contestId] || [];
        campuses.forEach(campus => {
            let option = document.createElement('option');
            option.value = campus.campus_id;
            option.textContent = campus.campus_name;
            campusSelect.appendChild(option);
        });
        modal.classList.remove('hidden');

        const form = document.getElementById('inscripcionForm');
        form.addEventListener('submit', (event) => handleFormSubmit(contestId, event));
    }

    function closeModal(modal) {
        modal.classList.add('hidden');
    }


    const contestIdToCampuses = await fetchContestCampuses();
    let modal = document.getElementById('modal');
    let campusSelect = document.getElementById('campusSelect');


    window.openModal = function(contestId) {
        openModal(contestId, contestIdToCampuses, modal, campusSelect);
    };

    window.closeModal = function() {
        closeModal(modal);
    };
});
