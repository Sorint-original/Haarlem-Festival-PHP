document.addEventListener('DOMContentLoaded', () => {
    const DaySection = document.getElementById('jazz-day');
    const Cday = document.getElementById('CurrentDay');
    const PrevButton =document.getElementById('PrevDay');
    const NextButton =document.getElementById('NextDay');

    const dayBackgrounds = ['D0','D1','D2','D3',];
    const days = ['THURSDAY JUL 24', 'FRIDAY JUL 25','SATURDAY JUL 26','SUNDAY JUL 27'];
    var CurrentDay = 0;


    const SetDay = () =>{
        DaySection.style.backgroundImage = `url(assets/images/jazz/${dayBackgrounds[CurrentDay]}.png)`;
        Cday.innerHTML =  days[CurrentDay];
    }

    const NextDay =() =>{
        CurrentDay += 1;
        if(CurrentDay == 4){
            CurrentDay=0;
        }
        SetDay();
    }

    const PrevDay =() =>{
        CurrentDay -= 1;
        if(CurrentDay == -1){
            CurrentDay=3;
        }
        SetDay();
    }

    PrevButton.addEventListener('click',  () => PrevDay());
    NextButton.addEventListener('click',  () => NextDay());
    
    SetDay();
});