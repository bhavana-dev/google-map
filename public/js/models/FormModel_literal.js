var FormModel = function(){
 
    function getInputText(){
       return document.getElementById('inputtext').value;
    }
 
    function changeInputText(){
        document.getElementById('inputtext').value = '';
    }
    function setInputText(value){

        const array = [
                {number: 1.,question:"What is your name?" ,mark :2},
                {number: 2.,question:"What is your Hobby?",mark :2},
                {number: 3.,question:"What is your Occupation?",mark :2},
                {number: 4.,question:"Where are you from?",mark :2},
            ];
        var total = '';
        total = _.find(array, function(value){
            
            return value.number == 3 ;
            // let data  = `<p class="para">${value.number} : ${value.question} (${value.mark} Marks) </p>` ;
            // document.getElementById("bodyCard").insertAdjacentHTML('beforeend',data);
            
        });
       // console.log(total.question);
        document.getElementById('inputtext').value = total.question;
       // $('#inputtext').val(value);
    }
 
    return {
        getInputText : getInputText,
        setInputText : setInputText,
        changeInputText : changeInputText
    }
};