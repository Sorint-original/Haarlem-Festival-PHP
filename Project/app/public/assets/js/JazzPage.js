document.addEventListener('DOMContentLoaded', () => {
    const DaySection = document.getElementById('jazz-day');
    const Cday = document.getElementById('CurrentDay');
    const dayBackgrounds = ['D0','D1','D2','D3',];
    const days = ['THURSDAY JUL 24', 'FRIDAY JUL 25','SATURDAY JUL 26','SUNDAY JUL 27'];
    const CurrentDay = 0;


    const SetDay = () =>{
        DaySection.style.backgroundImage = `url(assets/images/jazz/${dayBackgrounds[CurrentDay]}.png)`;
        Cday.innerHTML =  days[CurrentDay];
    }
    
    SetDay();
});