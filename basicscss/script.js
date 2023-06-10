let menuBtn = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .flex .navbar');
menuBtn.onclick = () =>{
    menuBtn.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

//
let videoList = document.querySelectorAll('.video-list-container .list');

videoList.forEach(vid =>{
   vid.onclick = () =>{
      videoList.forEach(remove =>{remove.classList.remove('active')});
      vid.classList.add('active');
      let src = vid.querySelector('.list-video').src;
      let title = vid.querySelector('.list-title').innerHTML;
      document.querySelector('.main-video-container .main-video').src = src;
      document.querySelector('.main-video-container .main-video').play();
      document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
   };
});


//test
const form = document.querySelector(".quiz-form");
const scores = document.querySelector(".score");
const corect = document.querySelectorAll(".corect");
//правильный ответ
const correctAnswer = ["C","C","C","C","C"];
form.addEventListener("submit",(e)=>{
    //сохранение ответа пользователя в массиве после отправки
    const userAnswer = [form.A1.value,form.A2.value,form.A3.value,form.A4.value,form.A5.value];
    let score = 0;
    //проверка ответа
    userAnswer.forEach((answer,index)=>{
        if(answer === correctAnswer[index]){
            //чтобы увидеть результаты, необходимо промотать страницу вверх
            scroll({
                top: 0, 
                left: 0, 
                behavior: 'smooth'
            });
            //добавление по 5 к каждому правильному ответу
            score+= 20;
        }
        //анимирование или подсчёт правильных ответов
        let count = 0;
        const timer = setInterval(()=>{
            scores.textContent = `${count}%`;
            if(count===score){
                clearInterval(timer);
            }else{
                count++;
            }
        },40)
    });
    e.preventDefault();
});
