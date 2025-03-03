

<section id="eventDates" class ="container-fluid d-flex flex-column m-5 p-0">
    <!--The buttons to change the date-->
    <menu class = "d-flex flex-row d-flex justify-content-between px-5 pt-5 m-0 w-100">
        <button type="button" class ="btn eventDate H2 current">Thursday Jul 24</button >
        <button type="button"  class ="btn eventDate H2">Friday Jul 25</button >
        <button type="button"  class ="btn eventDate H2">Saturday Jul 26</button >
        <button type="button"  class ="btn eventDate H2">Sunday Jul 27</button >
    </menu>

    <!--The event schedule-->
    <div class = "container-fluid d-flex flex-row justify-content-between p-5">
        <a id="Jazzlist"  class ="eventcard" href="#">
            <section class = "eventlist d-flex flex-column  align-items-center container-fluid mt-3"></section>
        </a>
        <a id = "Historylist" class =" eventcard " href="#">
            <section class = "eventlist d-flex flex-column  align-items-center container-fluid mt-3"> </section>
        </a>
        <a id ="Yummylist" class =" eventcard " href="#">
            <section class = "eventlist d-flex flex-column  align-items-center container-fluid mt-3"> </section>
        </a>
        <a id ="Magiclist" class =" eventcard " href="#">
            <section class = "eventlist d-flex flex-column  align-items-center container-fluid mt-3"> </section>
        </a>
        <a id ="Storieslist" class =" eventcard " href="#">
            <section class = "eventlist d-flex flex-column  align-items-center container-fluid mt-3"> </section>
        </a>
    </div>
</section>



<script>
    document.addEventListener('DOMContentLoaded', () => {
    const DateButtons = document.getElementsByClassName('eventDate');
    const DateSection = document.getElementById('eventDates');

    const changeeventDates = (image,clickedButton) => {
        Array.from(DateButtons).forEach(button => {
            button.classList.remove('current');
        });
        clickedButton.classList.add('current');
        DateSection.style.backgroundImage = `url(assets/images/${image}.png)`;
    };

    const specificParameters = ['SchedualeDay1', 'SchedualeDay2', 'SchedualeDay3', 'SchedualeDay4'];

    Array.from(DateButtons).forEach(button => {
        const img = specificParameters[Array.from(DateButtons).indexOf(button)];
        button.addEventListener('click',  () => changeeventDates(img,button));
    });
});
</script>