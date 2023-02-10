const content = document.querySelector('.content')

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

 