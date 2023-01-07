const siteUrl = 'http://eng.local/';

$(document).ready(function () {


    /// sound

    var txtInput = document.querySelector('#txtInput');
    var voiceList = document.querySelector('#voiceList');
    var btnSpeak = document.querySelector('#btnSpeak');
    var synth = window.speechSynthesis;
    var voices = [];

    if (voiceList != null) {
        PopulateVoices();
        if (speechSynthesis !== undefined) {
            speechSynthesis.onvoiceschanged = PopulateVoices;
        }
        btnSpeak.addEventListener('click', () => {
            var toSpeak = new SpeechSynthesisUtterance(txtInput.textContent);
            var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');


            voices.forEach((voice) => {
                if (voice.name === selectedVoiceName) {
                    toSpeak.voice = voice;
                }
            });
            synth.speak(toSpeak);
        });
    }

    function PopulateVoices() {
        voices = synth.getVoices();

        var selectedIndex = voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
        voiceList.innerHTML = '';
        voices.forEach((voice) => {
            var listItem = document.createElement('option');
            listItem.textContent = voice.name;
            listItem.setAttribute('data-lang', voice.lang);
            listItem.setAttribute('data-name', voice.name);
            voiceList.appendChild(listItem);
        });

        voiceList.selectedIndex = selectedIndex;
    }


    //Menu

    var icon = $(".mobile-menu-icon");
    var menu = $(".mobile-slider");
    var tl = new TimelineLite({paused: true, reversed: true});

    tl.fromTo(
        ".mobile-slider",
        0.3,
        {
            x: 200,
            autoAlpha: 0
        },
        {
            x: 0,
            autoAlpha: 1,
            ease: Power4.easeOut
        }
    );
    tl.to(
        ".filter",
        0.3,
        {
            autoAlpha: 1
        },
        0
    );
    icon.click(function () {
        tl.play();
    });
    $(".close-menu").click(function () {
        tl.reverse();
    });
    // Also close slider when clicking outside of the menu
    $(".filter").click(function () {
        tl.reverse();
    });


    /// delete

    $('.deleteItem').click(function (e) {
        if (confirm('Silmək istədiyinizdən əminsiniz')) {
        } else {
            e.preventDefault();
        }
    });



});