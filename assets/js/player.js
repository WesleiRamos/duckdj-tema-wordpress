window.addEventListener('load', () => {
  const audio = new Audio()
  const albumCover = document.querySelector('.album-cover video')
  const buttonListen = document.querySelector('button')
  const progressBar = document.querySelector('.progress-bar')

  /**
   * Quando a pagina não tem foco e o video é pausado, quando volta pra página
   * o video continua tocando
   */
  window.addEventListener('focus', () => {
    if (audio.currentTime === audio.duration)
      albumCover.pause()
  })

  /**
    * 
    */
  const changeButtonIcon = (element => () => {
    element.src = `${ASSETS_URL}/images/${audio.paused ? 'play' : 'pause'}.svg`
    audio.paused ? albumCover.pause() : albumCover.play()
  }) (
    buttonListen.querySelector('img')
  )

  /**
   * Se já tem dados no buffer então libera o botão
   */
  audio.addEventListener('canplay', () => buttonListen.disabled = false)

  /**
   * Atualiza a barra de progresso conforme o audio toca
   */
  audio.addEventListener('timeupdate', (bar => () => {
    bar.style.width = `${(audio.currentTime / audio.duration) * 100}%`
  })(
    progressBar.querySelector('.progress')
  ))

  
  audio.addEventListener('pause', () => {
    if (audio.currentTime === audio.duration)
      return

    changeButtonIcon()
  })
  audio.addEventListener('play', () => changeButtonIcon())
  audio.addEventListener('ended', () => changeButtonIcon())
  
  /**
    * Obtém a quantia de progresso selecionada na barra
    */
  progressBar.addEventListener('click', event => {
    const bcr = progressBar.getBoundingClientRect()
    const progress = (event.clientX - bcr.left) / bcr.width
    audio.currentTime = audio.duration * progress
    audio.play()
  })

  audio.src = `${ASSETS_URL}/audio/without-me-remix.ogg`
  albumCover.src = 'https://c.tenor.com/7zKZuIk31GEAAAPo/bird-dance.mp4'

  buttonListen.addEventListener('click', () => audio.paused ? audio.play() : audio.pause())
})