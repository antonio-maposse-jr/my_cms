document.addEventListener('turbo:load', loadAudioPageData)

function loadAudioPageData () {

    let audioPostSlug = $('.audioPostSlug').val()
    if (audioPostSlug == '' || typeof audioPostSlug == 'undefined'){
      return false;
    }
   
    $.ajax({
        url: route('audioDetailPage'),
        data: { audio_slug: audioPostSlug},
        type: 'post',
        success: function (result) {
            if (result.success) {
                Amplitude.init({
                    'bindings': {
                        37: 'prev',
                        39: 'next',
                        32: 'play_pause',
                    },
                    'songs': result.data.list
                })
            }
        },
    })
    
    /*
      Shows the playlist
    */
    document.getElementsByClassName('show-playlist')[0].addEventListener('click', function(){
        document.getElementById('white-player-playlist-container').classList.remove('slide-out-top');
        document.getElementById('white-player-playlist-container').classList.add('slide-in-top');
        document.getElementById('white-player-playlist-container').style.display = "block";
    });

    /*
      Hides the playlist
    */
    document.getElementsByClassName('close-playlist')[0].addEventListener('click', function(){
        document.getElementById('white-player-playlist-container').classList.remove('slide-in-top');
        document.getElementById('white-player-playlist-container').classList.add('slide-out-top');
        document.getElementById('white-player-playlist-container').style.display = "none";
    });

    /*
      Appends the song to the display.
    */
    // function appendToSongDisplay( song, index ){
    //     /*
    //       Grabs the playlist element we will be appending to.
    //     */
    //     var playlistElement = document.querySelector('.white-player-playlist');
    //
    //     /*
    //       Creates the playlist song element
    //     */
    //     var playlistSong = document.createElement('div');
    //     playlistSong.setAttribute('class', 'white-player-playlist-song amplitude-song-container amplitude-play-pause');
    //     playlistSong.setAttribute('data-amplitude-song-index', index);
    //
    //     /*
    //       Creates the playlist song image element
    //     */
    //     var playlistSongImg = document.createElement('img');
    //     playlistSongImg.setAttribute('src', song.cover_art_url);
    //
    //     /*
    //       Creates the playlist song meta element
    //     */
    //     var playlistSongMeta = document.createElement('div');
    //     playlistSongMeta.setAttribute('class', 'playlist-song-meta');
    //
    //     /*
    //       Creates the playlist song name element
    //     */
    //     var playlistSongName = document.createElement('span');
    //     playlistSongName.setAttribute('class', 'playlist-song-name');
    //     playlistSongName.innerHTML = song.name;
    //
    //     /*
    //       Creates the playlist song artist album element
    //     */
    //     var playlistSongArtistAlbum = document.createElement('span');
    //     playlistSongArtistAlbum.setAttribute('class', 'playlist-song-artist');
    //     playlistSongArtistAlbum.innerHTML = song.artist+' &bull; '+song.album;
    //
    //     /*
    //       Appends the name and artist album to the playlist song meta.
    //     */
    //     playlistSongMeta.appendChild( playlistSongName );
    //     playlistSongMeta.appendChild( playlistSongArtistAlbum );
    //
    //     /*
    //       Appends the song image and meta to the song element
    //     */
    //     playlistSong.appendChild( playlistSongImg );
    //     playlistSong.appendChild( playlistSongMeta );
    //
    //     /*
    //       Appends the song element to the playlist
    //     */
    //     playlistElement.appendChild( playlistSong );
    // }
}
