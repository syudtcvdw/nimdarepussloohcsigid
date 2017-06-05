<div class="cover-screen-with-this transition hide">
  <button class="btn btn-danger closeModal">Close</button>
  <div class="blackground"></div>
  <div class="modal-overlay hide"></div>

  <div class="treated-query-overlay hide">
    <div class="treated-content">
      <h3>Lorem Heading</h3>
      <p>Sure You Want To Mark This As Treated?</p>
      <button class="btn yes">Yes</button>
      <button class="btn no">No</button>
    </div>
  </div>
</div>

<div class="feedback-body-content">
  <div class="centered-view">

    <div class="top-section">

      <div class="body-section">
        <?php if ($this->allFeedback): ?>
          <?php $i = 1; ?>
          <?php foreach ($this->allFeedback as $feedback): ?>
            <div class="feedback-row <?= $feedback['status'] === 'treated' ? "" : "viewed" ?>">
              <div class="serialNo"> <?= $i++; ?></div>
              <div class="SchoolName"><?= $feedback['school_name']; ?></div>
              <div class="excerpt"> <?= $feedback["body"]; ?> </div>
              <div class="action">
                <button class="rowAction moreAction"><i class="iAction fa fa-ellipsis-h"></i></button>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

    </div>

  </div>
  <div class="button-switcher-wrapper">
    <div class="button-switchers">

      <button class="previous" disabled>Previous</button>

      <button class="next">Next</button>

    </div>
  </div>
</div>
