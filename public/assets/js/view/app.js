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
        


 }

 