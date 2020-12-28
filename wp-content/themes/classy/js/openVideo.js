// /**
//  * Open Video Window (YouTube)
//  *
//  * @returns {void}
//  */
//
//
// let player;
//
// function loadPlayer() {
//
//
//   let closeVideo = $('.js-close-video')
//
//   $('.js-video-show').on('click', function () {
//     let ths = $(this)
//     player.loadVideoById(ths[0].attributes[1].value)
//     $('.js-video-gallery__window').fadeIn(500)
//
//     // console.log('ths:', ths[0].attributes[1].value)
//     // $(ths).fadeIn(500)
//
//   })
//
//
//   closeVideo.on('click', function () {
//     player.stopVideo();
//     $('.js-video-gallery__window').fadeOut(500)
//     // player.loadVideoById('8D9d9weVQnI');
//     // alert('Hello my friend')
//   })
//
//   if (typeof (YT) == 'undefined' || typeof (YT.Player) == 'undefined') {
//     var tag = document.createElement('script');
//     tag.src = "https://www.youtube.com/iframe_api";
//     var firstScriptTag = document.getElementsByTagName('script')[0];
//     firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
//
//     window.onYouTubePlayerAPIReady = function () {
//       onYouTubePlayer();
//     };
//   }
// }
//
//
// function onYouTubePlayer() {
//
//   player = new YT.Player('open-video', {
//     height: '360',
//     width: '640',
//     videoId: 'dWSqqckKjVM',
//     events: {
//       'onReady': onPlayerReady,
//       'onStop' : onPlayerStop
//
//     }
//   });
// }
//
// function onPlayerReady(event) {
//   // event.target.stopVideo();
// }
//
// function onPlayerStop() {
//
//   // event.target.stopVideo();
// }
//
//
// $(function () {
//   onPlayerStop()
//
// })
//
//
// export default loadPlayer