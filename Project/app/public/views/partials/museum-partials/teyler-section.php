<section class="mysection teyler-section layout-image-left">
  <div class="container">
    <div class="row g-0">
      <!-- Left Side: Picture -->
      <div class="col-lg-6 col-md-12 image-container">
        <img src="../../../assets/images/iphone2.png" alt="Phone Image">
        <!--Google Play and AppStore Icons!-->
        <div class="icons">
          <img src="../../../assets/favicons/googleplay.png" alt="googleplay">
          <img src="../../../assets/favicons/appstore.png" alt="appstore">
        </div>
        <!--Google Play and AppStore Icons Ends!-->
      </div>
      <!-- Right Side: Text + FAQ -->
      <div class="col-lg-6 col-md-12 d-flex text-container">
        <div class="w-100">
          <div class="info-text">
            <h3 class="intro">THE SECRET OF PROFESSOR TEYLER</h3>
            <p>
              This event is a special interactive museum experience designed for children.
              Participants will work through scientific experiments and riddles to uncover the secret of Professor Teyler.
            </p>
            <p>
              The experience includes six different challenges, each requiring unique knowledge and skills.
              Participants will receive clues via an app, gather information, and enter solutions to earn rewards.
            </p>
            <!--FAQ-->
            <div class="faq-container w-100 ">
              <div class="row g-0">
                <div class="col-lg-12">
                  <?php
                  $sectionIndex = "teyler";
                  $faqData = [
                    ["question" => "When is the Magic Event ?", "answer" => "Magic event will be open from Thursday to Sunday."],
                    ["question" => "When it Starts and Ends ?", "answer" => "Magic event starts at 10.00 and it ends at 17.00."],
                    ["question" => "Is App Required ?", "answer" => "Yes, you need to have the app to be able to participate the event. You can download the app from Google Play Store or App Store."],
                    ["question" => "What is the price of the event?", "answer" => "There are no additional costs to participate in the event. You can join simply by using the tickets you purchased to enter the museum."],
                    ["question" => "Where is the location ? ", "answer" => "Here is the link. Museum Location."]
                  ];
                  include 'faq-template.php';
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>