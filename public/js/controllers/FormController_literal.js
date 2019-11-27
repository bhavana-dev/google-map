var FormController = function(pModel){
    
    var model = pModel || new FormModel();
    
    function fill_clicked(){
        model.setInputText();
    }
    
 
    function clear_clicked(){
         model.changeInputText();
    }
 
    function init(){
        document.getElementById('fillbutton').addEventListener('click',fill_clicked);
        document.getElementById('clearbutton').addEventListener('click',clear_clicked);
 
        // $('#fillbutton').click(function(){ fill_clicked(); });
        // $('#clearbutton').click(function(){ clear_clicked(); });
    }
 
    return {
        init: init,
        model : model
    };
};