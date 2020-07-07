
document.addEventListener('DOMContentLoaded', function(){
    var ocur = document.querySelectorAll('.occurrence');
    var status = document.getElementById('occurrence-status');
    var place = document.getElementById('occurrence-place');
    var clear = document.getElementById('occurrence-clear');
    var filterStatus = status.value;
    var filterPlace = place.value;

    // function searchPlace(){
    //     ocur.forEach(x =>{
    //         if(x.dataset.place.includes(filterPlace) 
    //             && x.dataset.status.includes(filterStatus)){
    //             x.classList.remove('is-hidden');
    //         } else  x.classList.add('is-hidden');
    //     })
    // }

    function search(){
        ocur.forEach(x =>{
            if(x.dataset.place.includes(filterPlace) 
                && x.dataset.status.includes(filterStatus)){
                x.classList.remove('is-hidden');
            } else  x.classList.add('is-hidden');
        })
    }

    status.addEventListener('change', (e)=>{
        filterStatus = e.target.value;
        search();
    })

    place.addEventListener('change', (e)=>{
        filterPlace = e.target.value;
        search();
    })

    clear.addEventListener('click', function(){
        ocur.forEach(oc =>{
            oc.classList.remove('is-hidden');
        });
        
        place.selectedIndex = 0;
        status.selectedIndex = 0;
        filterPlace = place.value;
        filterStatus = status.value;
    })
})
