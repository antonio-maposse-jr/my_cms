document.addEventListener('turbo:load', loadFullScreenData);

function loadFullScreenData(){
    let fullScreen = document.getElementById('gotoFullScreen');
    if (!$('#gotoFullScreen').length) {
        return
    }
    fullScreen.addEventListener(
        'click',
        function () {
            if (window.innerHeight == screen.height) {
                document.exitFullscreen();
            }
            document.body.requestFullscreen();
        },
        false,
    );
};
