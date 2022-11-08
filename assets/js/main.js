$( document ).ready(function() {


    var txtInput = document.querySelector('#txtInput');
    var voiceList = document.querySelector('#voiceList');
    var btnSpeak = document.querySelector('#btnSpeak');
    var synth = window.speechSynthesis;
    var voices = [];

    PopulateVoices();
    if(speechSynthesis !== undefined){
        speechSynthesis.onvoiceschanged = PopulateVoices;
    }

    btnSpeak.addEventListener('click', ()=> {
        var toSpeak = new SpeechSynthesisUtterance(txtInput.textContent);
        var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
        voices.forEach((voice)=>{
            if(voice.name === selectedVoiceName){
                toSpeak.voice = voice;
            }
        });
        synth.speak(toSpeak);
    });

    function PopulateVoices(){
        voices = synth.getVoices();
        var selectedIndex = voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
        voiceList.innerHTML = '';
        voices.forEach((voice)=>{
            var listItem = document.createElement('option');
            listItem.textContent = voice.name;
            listItem.setAttribute('data-lang', voice.lang);
            listItem.setAttribute('data-name', voice.name);
            voiceList.appendChild(listItem);
        });

        voiceList.selectedIndex = selectedIndex;
    }





      
    // $('.play-icon').click(function(e){

    //     e.preventDefault();

    //     let text = $('.word-eng').text()
    //     text = encodeURIComponent(text);
    //     var url = "https://translate.google.com.vn/translate_tts?ie=UTF-8&q=" + text + "&tl=en&client=tw-ob"
    
    //     $('.speech').attr('src', url).get(0).play();


    //     // http://translate.google.com/translate_tts?ie=UTF-8&q=Hello%20World&tl=en-us


    // })

    // var url = "https://translate.google.com.vn/translate_tts?ie=UTF-8&q=ANYTHING_TEXT&tl=en&client=tw-ob"

    // text to speech -- tts

});