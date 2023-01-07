$(document).ready(function () {

    var wordFromAjax;

    $('body').on('click', "#showAnswer", function () {

        let wordId = $(this).data('id');

        $.ajax({
            url: siteUrl + 'ajax/word.php',
            method: 'POST',
            data: {
                "wordId": wordId,
            },
            dataType: "text",
            async: false,
            global: false,
            success: function (data) {
                data = JSON.parse(data);
                wordFromAjax = data;

                $('.word').append('<span class="word-br"> - </span>');
                $('.word').append(`<span class="word-az"> ${data.az_word} </span>`);
                $('#showAnswer').hide();
                $('#answerBtn').removeClass('d-none');
                return wordFromAjax;
            }
        })


    });

    $('body').on('click', "#trueAnswer", function (e) {
        e.preventDefault();

        let id = wordFromAjax.id;
        $('#answerBtn').addClass('d-none');
        $('.newWord').removeClass('d-none');

        $.ajax({
            url: siteUrl + 'ajax/word.php',
            method: 'POST',
            data: {
                "trueAnswer": true,
                "id": id,
            },
            dataType: "text",
            async: false,
            global: false,
            success: function (data) {
                data = JSON.parse(data);
                wordFromAjax = data;

                $('.result').removeClass('d-none');
                $('.result-true').find('span').text(wordFromAjax.true_count);
                $('.result-false').find('span').text(wordFromAjax.false_count);

                if(wordFromAjax.percent < 59 && wordFromAjax.percent >= 0) {
                    $('.result-percent').addClass('bad');
                }else if(wordFromAjax.percent > 59 && wordFromAjax.percent <= 89) {
                    $('.result-percent').addClass('medium');
                }else {
                    $('.result-percent').addClass('good');
                }

                $('.result-percent').find('span').text(wordFromAjax.percent + '%');
            }
        })
    });

    $('body').on('click', "#falseAnswer", function (e) {
        e.preventDefault();

        let id = wordFromAjax.id;
        $('#answerBtn').addClass('d-none');
        $('.newWord').removeClass('d-none');

        $.ajax({
            url: siteUrl + 'ajax/word.php',
            method: 'POST',
            data: {
                "falseAnswer": true,
                "id": id,
            },
            dataType: "text",
            async: false,
            global: false,
            success: function (data) {
                data = JSON.parse(data);
                wordFromAjax = data;

                $('.result').removeClass('d-none');
                $('.result-true').find('span').text(wordFromAjax.true_count);
                $('.result-false').find('span').text(wordFromAjax.false_count);

                if(wordFromAjax.percent < 59 && wordFromAjax.percent >= 0) {
                    $('.result-percent').addClass('bad');
                }else if(wordFromAjax.percent > 59 && wordFromAjax.percent <= 89) {
                    $('.result-percent').addClass('medium');
                }else {
                    $('.result-percent').addClass('good');
                }

                $('.result-percent').find('span').text(wordFromAjax.percent + '%');
            }
        })








    });

    $('body').on('click', "#newWord", function (e) {


        let id  = wordFromAjax.id;
        // let id  = $('#showAnswer').data('id');

        console.log(id);

        $.ajax({
            url: siteUrl + 'ajax/word.php',
            method: 'POST',
            data: {
                "newWord": true,
                "id" : id,
            },
            dataType: "text",
            async: false,
            global: false,
            success: function (data) {
                data = JSON.parse(data);
                wordFromAjax = data;

                $('.word-br').remove();
                $('.word-az').remove();
                $('.result').addClass('d-none');
                $('.archive ').addClass('d-none');
                $('.newWord ').addClass('d-none');
                $('.word-eng ').text(wordFromAjax.en_word);
                $('#showAnswer').show();
                $('#showAnswer').data('id', wordFromAjax.id);

            }
        })


    })

});