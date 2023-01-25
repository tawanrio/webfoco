const content = document.querySelector('.content')

function createContainer(contentForm){
    const containerBackground = document.createElement('div');
    containerBackground.id = 'containerBackground';
 
    const containerAdd = document.createElement('div');
    containerAdd.id = 'containerAdd';
    containerAdd.innerHTML = contentForm
    
    content.appendChild(containerBackground);
    content.appendChild(containerAdd);
    
    document.querySelector('a#formCancel').addEventListener('click',() =>{
        content.removeChild(containerAdd);
        content.removeChild(containerBackground);
    })
 }
 