/**
 * Play HTML video with delay
 * @param {Number} delay
 * @param {String} selector
 * */

const playHtmlVideo = (selector, delay) => {
    const $videos = $(selector)
    
    setTimeout(() => {
        $videos.each(function () {
            const ths = $(this)
            
            ths[0].play()
        })
    }, delay)
}

export default playHtmlVideo
