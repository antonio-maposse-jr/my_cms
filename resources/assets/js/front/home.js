'use strict';

listen('submit','#pollVoteForm', function (event){
    event.preventDefault();
    let audioPostSlug = $('.audioPostSlug').val()
    if(audioPostSlug == null){
        Amplitude.stop()
    }
    if(!$(this).find("input:radio").is(":checked")){
        return false
    }
    $.ajax({
        type: 'POST',
        url: route('vote.poll'),
        data: $(this).serialize(),
        success: function(result) {
            if (result.data) {
                $(".poll-vote-form").trigger('reset');
                let pollIdSuccess = result.data.pollId;
                let styleCss = 'style';
                $('#voteSuccess'+pollIdSuccess).css('display','block');
                $('#pollOption' + result.data.pollId).addClass('d-none')
                $('#pollStatistic' + result.data.pollId).removeClass('d-none')
                let statisticAttr = $('#pollStatistic' + result.data.pollId)
                statisticAttr.empty()
                
                $.each(result.data.optionAns, function (key, val) {
                    statisticAttr.append(
                        `<p class="mt-0 mb-2 fs-14">${key}</p>
                                <div class="progress mb-3">
                                    <div class="progress-bar progress-bar-striped " role="progressbar"
                                         aria-valuenow="${val}" aria-valuemin="0" aria-valuemax="100"
                                    ${styleCss}="width: ${val}%;">
                                       <span>${val}%</span>
                                    </div>
                                </div>`
                    )
                })
                statisticAttr.append(
                    `<div class="vote d-flex justify-content-between align-items-center pt-2 mb-md-2 mb-1">
                            <span class="text-black fs-14 fw-6">` + Lang.get('messages.poll.total_vote') + `:${result.data.totalPollResults}</span>
                            <a href="javascript:void(0);" class="view-option fs-14 text-gray fw-6"
                               data-id="${result.data.pollId}">` + Lang.get('messages.poll.view_option') + `</a>
                        </div>
                        <span id='voteSuccess${pollIdSuccess}'><p class="text-success">${result.message}</p></span>`
                )
                $('#voteSuccess'+pollIdSuccess).delay(3000).slideUp(300);
                
            }
        },
        error: function(result) {
            let pollId = result.responseJSON.data.poll_id;
            $('#voteError'+pollId).css('display','block');
            $('#voteError'+pollId).html
            (`<p class="text-danger">${result.responseJSON.message}</p>`).delay(3000).slideUp(300);
            $(".poll-vote-form").trigger('reset');
        }
    });
});

listen('click', '.view-option', function (){
    let pollId = $(this).attr('data-id');
    $('#pollStatistic' + pollId).addClass('d-none')
    $('#pollOption' + pollId).removeClass('d-none')
})

listen('click', '.view-statistic', function () {
    let pollId = $(this).attr('data-id');
    $('#pollOption' + pollId).addClass('d-none')
    $('#pollStatistic' + pollId).removeClass('d-none')
})
listenClick('.js-cookie-consent-agree', function () {
    
    $('.js-cookie-consent').addClass('d-none');
});
listenClick('.js-cookie-consent-declined', function () {
    $('.js-cookie-consent').addClass('d-none');
    $.ajax({
        url: route('declineCookie'),
        type: 'GET',
        success: function success(result) {},
        error: function error(result) {
            displayErrorMessage(result.responseJSON.message);
        }
    });
});
