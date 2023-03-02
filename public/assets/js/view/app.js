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
    filtrosCheckBox.classList.toggle('invisible');
});


const inputFiltros = filtrosCheckBox.querySelectorAll('input')

const filtros = {status: null, propriedade: null}

inputFiltros.forEach( element =>{
    element.addEventListener('change', ()=>{
        if(element.id == 'filtroTotal') return
        let filter = '';
        let search = '';
        let novoUrl
        let novoSearch = []

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
        filter = filter.substring(0,filter.length -1)
        search = search.substring(0,search.length -1)


        let url_atual = window.location.search  ;

        if(url_atual.indexOf('filter') > 0){

        const beginFilter = url_atual.indexOf('filter') 
        let filters = url_atual.slice(beginFilter + 7)

        const beforeFilter = url_atual.slice(0, beginFilter-1)
        const endFilter = filters.indexOf('&')
        
        if(endFilter > 0) filters = filters.slice(0, endFilter);
        
        const beginSearch = url_atual.indexOf('search') 
        let searchs = url_atual.slice(beginSearch + 7)
        
        const endSearch = searchs.indexOf('&')
        if(endSearch > 0) {
            searchs = searchs.slice(0, endSearch);
        }
        positionEndSearch = url_atual.indexOf(searchs)

        let afterSearch = ''
        afterSearch = url_atual.slice(positionEndSearch + searchs.length)


        filters += '-' + filter
        searchs += '-' + search

        filters = filters.split('-');
        searchs = searchs.split('-');

        novoFiltro = filters.filter((valorAtual, indice, varArray) => {
            if(filters.lastIndexOf(valorAtual) === indice){
                searchs.filter((este,i) =>{
                    if(indice === i){
                        console.log(este);
                        novoSearch.push(este)
                    }
                })
            }
            return filters.lastIndexOf(valorAtual) === indice;
        })
        
        let newFilter = novoFiltro.join('-')
        let newSearch = novoSearch.join('-')

        novoUrl = `index.php${beforeFilter}&filter=${newFilter}&search=${newSearch}${afterSearch}#pgn`

    }else{
        novoUrl = `index.php${url_atual}&filter=${filter}&search=${search}#pgn`;
        
    }


    window.location.href = novoUrl
    })
})

filtroTotal.addEventListener('click', ()=>{
    inputFiltros.forEach(input=>{
        input.checked = false
    })
    filtroTotal.checked = true
    window.location.href = "index.php?page=manage&r=computer#pgn";
})