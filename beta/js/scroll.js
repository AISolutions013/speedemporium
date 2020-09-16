window.addEventListener('scroll', (evt) => {
  const  pos_top = document.body.scrollTop;   
  console.log(pos_top)
  if(pos_top > 100) {
    $('#logotipo').addClass('min')
  }else {
    $('#logotipo').removeClass('min')
  }
})