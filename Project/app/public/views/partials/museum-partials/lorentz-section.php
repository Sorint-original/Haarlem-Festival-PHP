<section class="mysection teyler-section layout-image-left">
  <div class="container">
    <div class="row g-0">
      <!-- Left Side: Picture -->
      <div class="col-lg-6 col-md-12 image-container">
        <img src="../../../assets/images/lorentz.png" alt="Phone Image">
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
                  $sectionIndex = "lorentz";
                  $faqData = [
                    ["question" => "When is the guided tour ?", "answer" => "The tour will be available from Thursday to Sunday."],
                    ["question" => "When it Starts and Ends ?", "answer" => "The tour runs three times a day at 12:30 AM, 14:00 PM, and 15:00 PM. The tour takes 50 minutes."],
                    ["question" => "Who can join the tour ?", "answer" => "The event is open to everyone aged 10 and above."],
                    ["question" => "What is the price of the tour ?", "answer" => "The tour is free to join with registration at the museum. Limited to 20 people, so register early!"],
                    ["question" => "Where is the location ?", "answer" => "Here is the link. Museum Location."]
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