const content = document.querySelector('.content')

const btnPlus = document.querySelector('div#plus')
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


const inputFiltros = filtrosCheckBox.querySelectorAll('.filtroChange')
// const selectFiltro = filtrosCheckBox.querySelectorAll('select')


const filtros = {status: null, propriedade: null}

function getNameValueRadioFilter(element){
    
    let filter = '';
    let search = '';
    if(element.checked){
        filtros[element.name] = element.id;
        
        if(element.id != 'filtroTotal'){
            filtroTotal.checked = false
        }
    }else{
        filtros[element.name] = element.value
    }
    for (const key in filtros) {
        if(filtros[key] && key != 'filtroTotal'){
            filter += key + '-'
            search += filtros[key] + '-'
        }
    }

    filter = filter.substring(0,filter.length -1)
    search = search.substring(0,search.length -1)

    return [filter, search]
}
function separateElementUrl(url_atual){
    
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
    let positionEndSearch = url_atual.indexOf(searchs)

    let afterSearch = ''
    afterSearch = url_atual.slice(positionEndSearch + searchs.length)


    return [beforeFilter, afterSearch ,filters, searchs]
}
function createSearchFilterArray(filters,searchs){
    
    // console.log(filters);
    let searchArray = []
    filters = filters.split('-');
    searchs = searchs.split('-');

    let filterArray = filters.filter((valorAtual, indice, varArray) => {
        if(filters.lastIndexOf(valorAtual) === indice){
            searchs.filter((este,i) =>{
                if(indice === i){
                    searchArray.push(este)
                }
            })
        }
        return filters.lastIndexOf(valorAtual) === indice;
    })

    return [filterArray, searchArray]
}

inputFiltros.forEach( element =>{
    element.addEventListener('change', ()=>{
        if(element.id == 'filtroTotal') return
        
        let [radioName,radioValue] = getNameValueRadioFilter(element);

        let url_atual = window.location.search  ;
        if(url_atual.indexOf('filter') > 0){
        let [beforeFilter, afterSearch ,filters, searchs] = separateElementUrl(url_atual);

        filters += '-' + radioName
        searchs += '-' + radioValue

        let [filterString, searchString] = createSearchFilterArray(filters, searchs)

        
        searchString = searchString.join('-')
        filterString = filterString.join('-')

        console.log(afterSearch);
        
        var novoUrl = `index.php${beforeFilter}&filter=${filterString}&search=${searchString}#pgn`

        
    }else{
        var novoUrl = `index.php${url_atual}&filter=${radioName}&search=${radioValue}#pgn`;
    }
    
    window.location.href = novoUrl
    })
})

filtroTotal.addEventListener('click', ()=>{
    inputFiltros.forEach(input=>{
        input.checked = false
    })
    filtroTotal.checked = true
    let outra_url = window.location.search  ;
    const beginPage = outra_url.indexOf('route') 
    let route = outra_url.slice(beginPage + 6)
    const endPage = route.indexOf('&')
    if(endPage > 0) route = route.slice(0, endPage);

    window.location.href = `index.php?page=manage&route=${route}#pgn`;
})