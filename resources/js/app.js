require('./bootstrap');

// window.confirmDelete = function() {
//     const resp = confirm("Vuoi cancellare?");

//     if(!resp) {
//         event.preventDefault();
//     }
// }

const deleteForm = document.querySelectorAll(".delete-post");

deleteForm.forEach(item => {
    item.addEventListener("submit" , function(e) {
        const resp = confirm("Vuoi cancellare?");

        if(!resp) {
            e.preventDefault();
        }
    })
})

const alertDiv = document.querySelectorAll(".alert");

if(alertDiv[0]) {
    setTimeout(() => {
        alertDiv[0].remove()
    }, 3000);
}
