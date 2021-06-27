const modal = document.getElementById('modal')
const active = document.getElementById('active-modal')


const initModal = () => {

    modal.classList.add('display')
    modal.addEventListener('click', (e) => {
        if(e.target.id == 'modal' || e.target.id == 'close'){
            modal.classList.remove('display')
        }
    })
}


active.addEventListener('click', initModal)

//
// Fancybox Configuration
$('[data-fancybox="gallery"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "share",
      "close"
    ],
    loop: false,
    protect: true
  });
  