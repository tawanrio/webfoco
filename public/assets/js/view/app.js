const content = document.querySelector('.content')

const btnPlus = document.querySelector('div#plus')
// const btnClose = document.querySelector('div#btnClose')
const filtrosCheckBox = document.querySelector('div#filtrosCheckBox')
const filtroTotal = document.querySelector('#filtroTotal')


function createContainer(contentForm, nameIdBackground = null, nameIdContainer = null){


    const containerBackground = document.createElement('div');
    containerBackground.className = 'containerBackground ';
    containerBackground.id = nameIdBackground || 'containerBackground';

    const containerAdd = document.createElement('div');
    containerAdd.className = 'containerAdd ';
    containerAdd.id = nameIdContainer || 'containerAdd';
    containerAdd.innerHTML = contentForm
    content.appendChild(containerBackground);
    content.appendChild(containerAdd);

    document.querySelector('a#formCancel').addEventListener('click',() =>{
        content.removeChild(containerAdd);
        content.removeChild(containerBackground);
    })

    let historicoLimpCancel = document.querySelector('#historicoLimpCancel')

    if(historicoLimpCancel){
        historicoLimpCancel.addEventListener('click', () =>{     

            historicoLimpBack.parentElement.removeChild(historicoLimpBack);
            historicoLimpContainer.parentElement.removeChild(historicoLimpContainer)
        })}

    let historicoMaqCancel = document.querySelector('#historicoMaqCancel')
    if(historicoMaqCancel){
        historicoMaqCancel.addEventListener('click', () =>{

            historicoMaqBack.parentElement.removeChild(historicoMaqBack);

            historicoMaqContainer.parentElement.removeChild(historicoMaqContainer)

        })}

 }

 function getDate(value){

    const positionSeparator = value.indexOf('/');

    const dateLastClean = value.substring(0,positionSeparator)

    return dateLastClean

 }

 function getType(value){

    const positionSeparator = value.indexOf('/');

    let typeLastClean = value.substring(positionSeparator +1)

    typeLastClean = typeLastClean.replaceAll('_', ',')

    return typeLastClean

 }


 btnPlus.addEventListener('click',(e)=>{
    const divSearch = btnPlus.parentElement
    divSearch.querySelector('form').classList.toggle('invisible');
    divSearch.querySelector('div#plus').classList.toggle('active');
    // divSearch.querySelector('div#magnifying').classList.toggle('invisible');
    // divSearch.querySelector('div#btnClose').classList.toggle('invisible');
});
    // btnClose.addEventListener('click',(e)=>{
    // const divSearch = btnClose.parentElement
    // divSearch.querySelector('form').classList.toggle('invisible');
    // // divSearch.querySelector('div#plus').classList.toggle('invisible');
    // divSearch.querySelector('div#btnClose').classList.toggle('invisible');
// });


const inputFiltros = filtrosCheckBox.querySelectorAll('input')

const filtros = {status: null, propriedade: null}

inputFiltros.forEach( element =>{
    element.addEventListener('change', ()=>{
        let filter = '';
        let search = '';

        if(element.checked){
            filtros[element.name] = element.id;

            if(element.id != 'filtroTotal'){
                filtroTotal.checked = false
            }

        }else{
            filtros[element.name] = null
        }

        for (const key in filtros) {
            if(filtros[key] && key != 'filtroTotal'){
                filter += key + '-'
                search += filtros[key] + '-'
            }
            
        }

        let url_atual = window.location.search  ;
        if(url_atual.indexOf('filter') > 0){

        filter = filter.substring(0,filter.length -1)
        search = search.substring(0,search.length -1)

        const beginFilter = url_atual.indexOf('filter') 
        let filters = url_atual.slice(beginFilter + 7)
        const beforeFilter = url_atual.slice(0, beginFilter-1)
        let afterSearch = ''
        const endFilter = filters.indexOf('&')
        if(endFilter > 0) filters = filters.slice(0, endFilter);

        const beginSearch = url_atual.indexOf('search') 
        let searchs = url_atual.slice(beginSearch + 7)

        const endSearch = searchs.indexOf('&')
        // console.log(endSearch);
        if(endSearch > 0) {
            searchs = searchs.slice(0, endSearch);
            // console.log(searchs);
        }
        positionEndSearch = url_atual.indexOf(searchs)
        afterSearch = url_atual.slice(positionEndSearch + searchs.length)

        // console.log(filters);
        // console.log(searchs);

        // console.log(filter);
        // console.log(search);

        // console.log(beforeFilter);
        console.log(afterSearch);

        // console.log(url_atual);
        let newFilter = filters + '-' + filter
        let newSearch = searchs + '-' + search

        // console.log(newFilter);
        // console.log(newSearch);
        const novoUrl = `index.php${beforeFilter}&filter=${newFilter}&search=${newSearch}${afterSearch}`

        console.log(novoUrl);
        window.location.href = novoUrl

        // url_atual = url_atual.replace('filter=', 'filter='+filter+'-') 
        // url_atual = url_atual.replace('search=', 'search='+search+'-') 

            // console.log(url_atual);
        }


            // if(url_atual.indexOf('propriedade') < 0){

            // }else{
            //     url_atual = url_atual.replace('filter=', 'filter='+filter+'-') 
            //     url_atual = url_atual.replace('search=', 'filter='+search+'-') 

            // }
            


        // }else{
        //    url_atual = url_atual + '&filter=' +filter
        //    url_atual = url_atual + '&search=' +search
        // }

        
    })
})

filtroTotal.addEventListener('click', ()=>{
    inputFiltros.forEach(input=>{
        input.checked = false
    })
    filtroTotal.checked = true
    window.location.href = "index.php?page=manage&r=computer";
})