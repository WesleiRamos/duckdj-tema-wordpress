window.addEventListener('load', () => {
  const menu = document.querySelector('.hamburger-menu')
  const menuIcon = document.querySelector('.menu-icon')

  /**
    * Menu abre fecha
    */
   menuIcon.addEventListener('click', (setIcon => () => {
    menu.classList.toggle('opened')
    window.scrollTo({ top: 0, behavior: 'smooth' })
    setIcon(menu.classList.contains('opened') ? 'menu-close' : 'menu')
  })(
    img => menuIcon.querySelector('img').src = `${ASSETS_URL}/images/${img}.svg`)
  )
})