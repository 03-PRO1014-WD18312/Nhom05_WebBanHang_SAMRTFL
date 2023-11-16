
function runCodeJs(){

    ckediter();

    itemQuestionExam();

}

runCodeJs();





// ckediter

function ckediter(){

let allCkediter = document.querySelectorAll('.ckediter');

if(allCkediter != null){
    allCkediter.forEach((item, index) => { 
        item.id = 'ckediter_'+index;
        CKEDITOR.replace(item.id);
    });
}

}


function itemQuestionExam(){


    let html_question_exam = `<div class="item_question row mx-0">

    <div class="col-11 row mx-0">
    
    <div class="form-group col-12 ">
        <label for="">Câu hỏi</label>
        <textarea name="message[]" id="" cols="30" rows="10" class="ckediter w-100"></textarea>
    </div>
    
    <div class="form-group col-6">
        <label for="">Đáp án 1</label>
        <input type="text" name="answer_1[]" class="form-control">
    </div>
    
    <div class="form-group col-6">
        <label for="">Đáp án 2</label>
        <input type="text" name="answer_2[]" class="form-control">
    </div>
    
    <div class="form-group col-6">
        <label for="">Đáp án 3</label>
        <input type="text" name="answer_3[]" class="form-control">
    </div>
    
    <div class="form-group col-6">
        <label for="">Đáp án 4</label>
        <input type="text" name="answer_4[]" class="form-control">
    </div>
    
    <div class="form-group col-12">
        <label for="">Đán án đúng</label>
        <input type="number" max="4" min="1" value="1" name="right_answer[]" class="form-control">
    </div>
    
    
    </div>
    
    
    <div class="col-1">
        <span class="btn btn-danger w-100 remove_question"><i class="fa fa-times"></i></span>
    </div>
    
    </div>`; 


    let add_question = document.querySelector('.add_question');
    let box_question = document.querySelector('.box_question');


    if(add_question != null && box_question != null){



        add_question.addEventListener('click', () => {

            let question_parser = new DOMParser().parseFromString(html_question_exam, 'text/html').querySelector('.item_question');

            box_question.appendChild(question_parser);

            let remove_questions = box_question.querySelectorAll('.remove_question');

            if(remove_questions != null){
                remove_questions.forEach((item) => {
                    item.addEventListener('click', (e) => {
                        let remove = e.target;
                        while(true){
                            remove = remove.parentElement;
                            if(remove.classList.contains('item_question')) break;
                        }
                        remove.remove();
                    });
                });
            }
        });

        let remove_questions = box_question.querySelectorAll('.remove_question');

        if(remove_questions != null){
            remove_questions.forEach((item) => {
                item.addEventListener('click', (e) => {
                    let remove = e.target;

                    if(confirm('Are you sure remove !')){
                    while(true){
                        remove = remove.parentElement;
                        if(remove.classList.contains('item_question')) break;
                    }
                    remove.remove();  
                    }
                });
            });
        }
    }
}


