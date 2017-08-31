// 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          videoId: 's0hNYub-y5E',
          height: '390',
          width: '100%',
          playerVars: {
            autoplay: 1,        // Auto-play the video on load
            controls: 0,        // Show pause/play buttons in player
            showinfo: 0,        // Hide the video title
            modestbranding: 1,  // Hide the Youtube Logo
            loop: 1,            // Run the video in a loop
            fs: 1,             // Hide the full screen button
            cc_load_policy: 0, // Hide closed captions
            iv_load_policy: 3,  // Hide the Video Annotations
            autohide: 0         // Hide video controls when playing
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          },
          events: {
            onReady: function(e) {
              e.target.mute();
            }
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }

/* Makes The video full size */
/*
      $(document).ready(function() {
        $(function(){
          $('#player').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });

          $(window).resize(function(){
          $('#player').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
            });
          });
      });

*/

