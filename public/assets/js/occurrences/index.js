
document.addEventListener('DOMContentLoaded', function(){
    var ocur = document.querySelectorAll('.occurrence');
    var status = document.getElementById('occurrence-status');
    var place = document.getElementById('occurrence-place');
    var clear = document.getElementById('occurrence-clear');

    function searchPlace(text){
        if(text != '' || text != null){
            ocur.forEach(x =>{
                if(x.dataset.place.includes(text)){
                    x.classList.remove('is-hidden');
                } else  x.classList.add('is-hidden');
            })
        }
    }

    function searchStatus(val){
        ocur.forEach( x => {
            if(val == 1){
                if(x.dataset.status == 'resolvido'){
                    x.classList.remove('is-hidden');
                } else  x.classList.add('is-hidden');
            } else if(val == 2){
                if(x.dataset.status == 'Aberto'){
                    x.classList.remove('is-hidden');
                } else  x.classList.add('is-hidden');
            } else{
                x.classList.remove('is-hidden');
            }
        })
    }

    status.addEventListener('change', (e)=>{
        searchStatus(e.target.value);
    })

    place.addEventListener('change', (e)=>{
        searchPlace(e.target.value);
    })

    clear.addEventListener('click', function(){
        ocur.forEach(oc =>{
            oc.classList.remove('is-hidden');
        })
    })
})
