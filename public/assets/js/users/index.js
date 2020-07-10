

document.addEventListener('DOMContentLoaded', function() {
    var searchBar = document.getElementById('user-search');
var users = document.querySelectorAll('.user');
    searchBar.addEventListener('input', function(){
        console.log(searchBar.value);
        users.forEach(x => {
            if(x.dataset.name.includes(searchBar.value)){
                x.classList.remove('is-hidden');
            } else x.classList.add('is-hidden');
        })
    });
})
