
(function() {
    function buildQuiz() {
      // we'll need a place to store the HTML output
      const output = [];
  
      // for each question...
      myQuestions.forEach((currentQuestion, questionNumber) => {
        // we'll want to store the list of answer choices
        const answers = [];
  
        // and for each available answer...
        for (letter in currentQuestion.answers) {
          // ...add an HTML radio button
          answers.push(
            `<label>
              <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
            </label>`
          );
        }
  
        // add this question and its answers to the output
        output.push(
          `<div class="question"> ${currentQuestion.question} </div>
          <div class="answers"> ${answers.join("")} </div>`
        );
      });
  
      // finally combine our output list into one string of HTML and put it on the page
      quizContainer.innerHTML = output.join("");
    }
  
    function showResults() {
      // gather answer containers from our quiz
      const answerContainers = quizContainer.querySelectorAll(".answers");
  
      // keep track of user's answers
      let numCorrect = 0;
  
      // for each question...
      myQuestions.forEach((currentQuestion, questionNumber) => {
        // find selected answer
        const answerContainer = answerContainers[questionNumber];
        const selector = `input[name=question${questionNumber}]:checked`;
        const userAnswer = (answerContainer.querySelector(selector) || {}).value;
  
        // if answer is correct
        if (userAnswer === currentQuestion.correctAnswer) {
          // add to the number of correct answers
          numCorrect++;
  
          // color the answers green
          answerContainers[questionNumber].style.color = "lightgreen";
        } else {
          // if answer is wrong or blank
          // color the answers red
          answerContainers[questionNumber].style.color = "red";
        }
      });
  
      // show number of correct answers out of total
      resultsContainer.value = `${numCorrect}`;
      if(numCorrect>=5){
        button.innerHTML = '<button class="btn btn-success" style="margin-top:10px;" type="submit">Save And Certificate </button>';
   
      }else{
        button.innerHTML = '<button class="btn btn-success" style="margin-top:10px;" type="submit" disabled>Save And Certificate </button><h4>Certificate generated only 50% or about 50%</h4>';

      }
      
    }
  
    const quizContainer = document.getElementById("quiz");
    const resultsContainer = document.getElementById("results") ;
    const button = document.getElementById("certificate");
    const submitButton = document.getElementById("submit");
    const myQuestions = [
      {
        question: "1. Which method returns the average value of a given key ?" ,
        answers: {
          A: "average()",
          B: "median()",
          C: "avg()",
          D:"avg_val()"
        },
        correctAnswer: "C"
      },
      {
        question: "2. Bootstrap directory in Laravel is used to",
        answers: {
          A: 'Initialize a Laraval application',
          B: 'Call laravel library functions',
          C: 'Load the configuration files',
          D: 'Load laravel classes and models'
        },
        correctAnswer: "A"
      },
      {
        question: "3. Which artisan command is used to remove the compiled class file.",
        answers: {
          A: "clear-compiled",
          B: "clear compiled",
          C: "compiled:clear",
          D: "clear:all"
        },
        correctAnswer: "A"
      },
      {
        question: "4. Which method breaks the collection into multiple, smaller collections of a given size",
        answers: {
          A: "split() ",
          B: " chunk()",
          C: "explode() ",
          D: "break()"
        },
        correctAnswer: "B"
      },
      {
        question: "5. Artisan command to flush the application cache:",
        answers: {
          A: " cache:flush ",
          B: " cache:clear",
          C: "cache:forget",
          D: "cache:remove"
        },
        correctAnswer: "B"
      },
      {
        question: "6. The vendor directory contains",
        answers: {
          A: " Laravel Framework code",
          B: "Assets",
          C: "Third-party code",
          D: "Configuration files"
        },
        correctAnswer: "C"
      },
      {
        question: "7. Where is the routing file located in Laravel ?",
        answers: {
          A: "app/Http/",
          B: " routes/",
          C: "urls/",
          D: "vendors/"
        },
        correctAnswer: "B"
      },
      {
        question: "8. View files in Laravel end in",
        answers: {
          A: ".blade.php",
          B: ".php",
          C: ".vue ",
          D: ".blade"
        },
        correctAnswer: "A"
      },
      {
        question: "9. Which of following methods are used in database migrations classes?",
        answers: {
          A: " execute() and rollback()",
          B: " up() and down()",
          C: " run() and delete()",
          D: "save() and update()"
        },
        correctAnswer: "B"
      },
      {
        question:"10. Which directory contain “robot.txt” file ?",
        answers: {
          A: "app",
          B: "public",
          C: "config",
          D:"storage"
        },
        correctAnswer: "B"
      }
    ];
  
    // display quiz right away
    buildQuiz();
  
    // on submit, show results
    submitButton.addEventListener("click", showResults);
  })();