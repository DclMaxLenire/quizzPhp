function addQuestion() {
    var Contenu = document.getElementById('quizQuestion').innerHTML; 
    Contenu = Contenu + '<br/><input type=\"text\ name="quizQuestion" placeholder="ajouter une question"/>'; 
    document.getElementById('quizQuestion').innerHTML = Contenu; }

function addReponse() {
    var Contenu = document.getElementById('quizReponse').innerHTML; 
    Contenu = Contenu + '<br/><input type=\"text\ name="quizReponseChoix" placeholder="ajouter la reponse"/>'; 
    document.getElementById('quizReponse').innerHTML = Contenu; }