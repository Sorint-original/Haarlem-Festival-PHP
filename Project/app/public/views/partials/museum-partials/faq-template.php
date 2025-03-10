<!-- faq-template.php -->
<div class="accordion" id="faqAccordion<?php echo $sectionIndex; ?>">
    <?php foreach ($faqData as $index => $faq): ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $sectionIndex . $index; ?>">
                <button class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse<?php echo $sectionIndex . $index; ?>"
                    aria-expanded="false"
                    aria-controls="collapse<?php echo $sectionIndex . $index; ?>">
                    <?php echo htmlspecialchars($faq['question']); ?>
                </button>

            </h2>
            <div id="collapse<?php echo $sectionIndex . $index; ?>"
                class="accordion-collapse collapse"
                aria-labelledby="heading<?php echo $sectionIndex . $index; ?>"
                data-bs-parent="#faqAccordion<?php echo $sectionIndex; ?>">

                <div class="accordion-body">
                    <?php echo htmlspecialchars($faq['answer']); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>