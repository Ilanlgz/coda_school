document.addEventListener('DOMContentLoaded', () => {

    let currentQuestion = 1;
    let correctAnswers = 0;
    let incorrectAnswers = 0;

    function showQuestion(questionNumber) {
        document.querySelector('#question-' + currentQuestion + '-content').classList.remove('show', 'active');
        currentQuestion = questionNumber;
        document.querySelector('#question-' + currentQuestion + '-content').classList.add('show', 'active');
    }

    function updateProgress(questionNumber) {
        let progressBar = document.querySelector('#progress').querySelector('.progress-bar');
        let progress = ((questionNumber) / 10) * 100;

        progressBar.style.width = progress + '%';
        progressBar.textContent = progress + '%';

        
        if (progress === 100) {
            progressBar.style.backgroundColor = 'green';
        } else {
            progressBar.style.backgroundColor = '';
        }
    }

    function nextQuestion() {
        const currentQuestionElement = document.querySelector('#form-question-' + currentQuestion);
        const selectedAnswer = currentQuestionElement.querySelector('input[type="radio"]:checked');

        if (selectedAnswer) {

            if (selectedAnswer.getAttribute('data-correct') === 'true') {
                correctAnswers++;
            } else {
                incorrectAnswers++;
            }
          
            document.querySelector('#question-' + currentQuestion + '-content').classList.remove('active');

            if (currentQuestion < 10) {
                document.querySelector(`#question${currentQuestion + 1}`).removeAttribute('disabled');

                document.querySelector(`#question${currentQuestion}`).style.backgroundColor = 'green';
                document.querySelector(`#question${currentQuestion}`).style.color = 'white';
             
                showQuestion(currentQuestion + 1);
                updateProgress(currentQuestion - 1);
            

            } else {
                document.querySelector(`#question10`).style.backgroundColor = 'green';
                document.querySelector(`#question10`).style.color = 'white';
                const nextButtons = document.querySelector('#next-btn');
                nextButtons.setAttribute('hidden', true);
                const previousBtn = document.querySelector('#previous-btn');
                previousBtn.setAttribute('hidden', true);
                updateProgress(currentQuestion);
            }
        } else {
            alert('Veuillez sélectionner une réponse avant de passer à la question suivante.');
        }  
    }

   const resultButton = document.querySelector('#results');
    resultButton.addEventListener('click', () => {
        const chart = document.querySelector('#my-chart');
        new Chart(chart, {
            type: 'doughnut',
            data: {
                labels: ['Bonnes réponses', 'Mauvaises réponses'],
                datasets: [{
                    label: '# réponses',
                    data: [correctAnswers, incorrectAnswers],
                    backgroundColor: [
                        'rgb(21, 255, 0)',
                        'rgb(255, 0, 0)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
        nextButtons.forEach(button => {
            button.setAttribute('hidden', true);
        });
        const previousBtn = document.querySelector('#previous-btn');
        previousBtn.setAttribute('hidden', true);
    });


    document.querySelector('#question1').classList.add('active');

    const nextButtons = document.querySelectorAll('#next-btn');
    nextButtons.forEach(button => {
        button.addEventListener('click', nextQuestion);
    });
});
