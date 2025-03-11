
document.addEventListener('DOMContentLoaded', () => {
const DateButtons = document.getElementsByClassName('eventDate');
const DateSection = document.getElementById('eventDates');

const changeeventDates = (image,clickedButton) => {
    Array.from(DateButtons).forEach(button => {
        button.classList.remove('current');
    });
    clickedButton.classList.add('current');
    DateSection.style.backgroundImage = `url(assets/images/complexLayouts/${image}.png)`;

};

const specificParameters = ['SchedualeDay1', 'SchedualeDay2', 'SchedualeDay3', 'SchedualeDay4'];

Array.from(DateButtons).forEach(button => {
    const img = specificParameters[Array.from(DateButtons).indexOf(button)];
    button.addEventListener('click',  () => changeeventDates(img,button));
});
});